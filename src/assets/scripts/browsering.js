/**
 * History and request
 */

const selectorLinks = "a[href^='" + window.location.protocol+'//'+window.location.hostname + "']:not([href*='wp-content/uploads']):not([href*='feed']):not([href*='wp-admin']):not([href*='wp-login'])";

export default class {
  constructor({ timeout = 0, ready = false }) {
    this.$           = {
      title          : document.querySelector('title'),
      content        : document.querySelector('.content')
    };
    this.context     = {
      url            : window.location.href,
      isLoading      : false
    };
    this.timeout     = timeout;
    this.ready       = (ready) ? ready : () => {};
    this.DOM         = document.createElement('div');
    this.cache       = {};
    this.handleClick = this.handleClick.bind(this);

    this.init();
  }

  init() {
    this.bindLinks();

    // Update the page content when the popstate event is called.
    window.addEventListener('popstate', (event) => {
      this.updateContent(event.state, true);
    });

    // Update this history event for the first page.
    let $main = this.$.content.querySelector('.template');
    this.cache[this.context.url] = {
      title      : this.$.title.innerHTML,
      classNames : $main.className,
      content    : $main
    };
    history.replaceState(this.context.url, this.cache[this.context.url].title, '');
  }

  // Attach click listeners for each of the nav links.
  bindLinks() {
    this.$.links = document.querySelectorAll(selectorLinks);
    Array.from(this.$.links).forEach(link => {
      link.addEventListener('click', this.handleClick, false);
    });
  }

  // Remove click listeners for each of the nav links.
  unbindLinks() {
    Array.from(this.$.links).forEach(link => {
      link.removeEventListener('click', this.handleClick);
    });
  }

  // Handle click
  handleClick(event) {
    event.preventDefault();
    let url = event.currentTarget.href;
    if(url !== this.context.url) {
      this.context.isLoading = true;
      this.context.url = url;

      this.loadPage(url, () => {
        // scroll to top
        document.body.scrollTop = 0
        document.documentElement.scrollTop = 0

        this.context.isLoading = false;
        this.updateContent(url);
        window.history.pushState(url, this.cache['title'], url);
      });
    }
  }

  // Update Content
  updateContent(url, force = false) {
    const TICK = 17;
    let $transitionOld = document.querySelector('.content__item');
    let $transitionNew = document.createElement('div');
        $transitionNew.appendChild(this.cache[url].content);

    this.$.title.innerHTML = this.cache[url].title;
    this.$.content.appendChild($transitionNew);

    if(force) {
      $transitionNew.className = 'content__item';
      this.$.content.removeChild($transitionOld);
    } else {
      $transitionOld.className = 'content__item content__item--leave';
      $transitionNew.className = 'content__item content__item--enter';
      setTimeout(() => {
        $transitionOld.classList.add('is-active');
        $transitionNew.classList.add('is-active');
        setTimeout(() => {
          this.$.content.removeChild($transitionOld);
          $transitionNew.classList.remove('is-active', 'content__item--enter');
        }, this.timeout + TICK);
      }, TICK);
    }

    this.unbindLinks();
    this.bindLinks();
    this.ready();
  }

  // Load html
  loadPage(url, callback) {
    if(this.cache[url]) {
      callback();
      return;
    }

    let xhr = new XMLHttpRequest();
        xhr.open('get', url);
        xhr.send(null);
    xhr.onreadystatechange = () => {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          this.DOM.innerHTML = xhr.responseText;
          this.cache[url] = {
            title: this.DOM.querySelector('title').innerHTML,
            classNames: this.DOM.querySelector('.template').className,
            content: this.DOM.querySelector('.template')
          };
          callback();
        } else {
          console.log('Error: ' + xhr.status); // An error occurred during the request.
        }
      }
    };
  }

}
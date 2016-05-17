/**
 * History and request
 */

const TICK = 17
const selectorLinks =
  'a[href^="' + window.location.protocol + '//' + window.location.hostname + '"]'
  + ':not([href*="wp-content/uploads"])'
  + ':not([href*="feed"])'
  + ':not([href*="wp-admin"])'
  + ':not([href*="wp-login"])'

export default class {
  constructor({ timeout = 0, ready = false }) {
    this.$           = {
      title          : document.querySelector('title'),
      navigation     : document.querySelector('.navigation'),
      content        : document.querySelector('.content')
    }
    this.context     = {
      url            : window.location.href,
      isLoading      : false
    }
    this.timeout     = timeout
    this.ready       = (ready) ? ready : () => {}
    this.DOM         = document.createElement('div')
    this.cache       = {}
    this.handleClick = this.handleClick.bind(this)

    this.init()
  }

  init() {
    this.updateListeners()

    // Update the page content when the popstate event is called.
    window.addEventListener('popstate', (event) => {
      this.loadPage(event.state)
    })

    // Update this history event for the first page.
    const $main = this.$.content.querySelector('.template')
    this.cache[this.context.url] = {
      title      : this.$.title.innerHTML,
      classNames : $main.className,
      content    : $main,
      navigation : this.$.navigation.innerHTML
    }
    history.replaceState(this.context.url, this.cache[this.context.url].title, '')
  }

  updateListeners() {
    this.unbindLinks()
    this.bindLinks()
    this.ready()
  }

  // Attach click listeners for each of the nav links.
  bindLinks() {
    this.$.links = document.querySelectorAll(selectorLinks)
    Array.from(this.$.links).forEach(link => {
      link.addEventListener('click', this.handleClick, false)
    })
  }

  // Remove click listeners for each of the nav links.
  unbindLinks() {
    if(this.$.links) {
      Array.from(this.$.links).forEach(link => {
        link.removeEventListener('click', this.handleClick)
      })
    }
  }

  // Handle click
  handleClick(event) {
    event.preventDefault()
    let url = event.currentTarget.href
    if(url !== this.context.url) {
      this.loadPage(url, true)
    }
  }

  // Update Content
  updateContent(url) {
    let $transitionNew = document.createElement('div')
    $transitionNew.appendChild(this.cache[url].content)

    let $transitionOld = [].slice.call(document.querySelectorAll('.content__item'))
    while($transitionOld.length > 1) {
      this.$.content.removeChild($transitionOld.splice(0, 1)[0])
    }
    $transitionOld = $transitionOld[0]

    this.context.url = url
    this.$.title.innerHTML = this.cache[url].title
    this.$.content.appendChild($transitionNew)

    $transitionOld.className = 'content__item content__item--leave'
    $transitionNew.className = 'content__item content__item--enter'
    setTimeout(() => {
      $transitionOld.classList.add('is-active')
      $transitionNew.classList.add('is-active')
      this.$.navigation.innerHTML = this.cache[url].navigation

      setTimeout(() => {
        if ($transitionOld.parentNode === this.$.content) {
          this.$.content.removeChild($transitionOld)
          this.updateListeners()
        }
        $transitionNew.classList.remove('is-active', 'content__item--enter')
      }, this.timeout + TICK)
    }, TICK)
  }

  // Load html
  loadPage(url, isHistory) {
    this.context.isLoading = true
    this.request(url, () => {
      // scroll to top
      document.body.scrollTop = 0
      document.documentElement.scrollTop = 0

      this.context.isLoading = false
      this.updateContent(url)
      if(isHistory) {
        window.history.pushState(url, this.cache[url]['title'], url)
      }
    })
  }

  /* Request */
  request(url, callback) {
    if(this.cache[url]) {
      callback()
      return
    }

    let xhr = new XMLHttpRequest()
    xhr.open('get', url)
    xhr.send(null)
    xhr.onreadystatechange = () => {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          this.DOM.innerHTML = xhr.responseText
          this.cache[url] = {
            title: this.DOM.querySelector('title').innerHTML,
            classNames: this.DOM.querySelector('.template').className,
            content: this.DOM.querySelector('.template'),
            navigation: this.DOM.querySelector('.navigation').innerHTML
          }
          callback()
        } else {
          console.log('Error: ' + xhr.status) // An error occurred during the request.
        }
      }
    }
  }
}

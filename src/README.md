# Theme Source

Only this directory and its parent need to be versioned.

Example of html tree with BEM convention
```
nav.navigation
  div.container
    a.navigation__title
    div.navigation__menu
      ul.menu
        li.menu__item.menu__item--current

div.content
  div.content__item (used for page transition)

    main.template.template--home
      header.header
        div.container
          h1.header__title

      div.container
        div.feed
          ul.feed__list
            li.feed__item
              a.post.post--type-post
                div.post__cover
                div.post__text
                  h2.post__title
                  div.post__excerpt

        div.sidebar
          aside.widget.widget--archive
            h2.widget__title

      footer.footer
        section.footer__sidebar
          div.container
            aside.widget.widget--text
              h2.widget__title

        section.footer__bottom
          div.container
            p.footer__copy
            div.footer__navigation
              ul.menu
                li.menu__item.menu__item--current
```

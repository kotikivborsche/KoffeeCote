$(document).ready(() => {

    const _html = (html) => {
        if (typeof html !== 'string') return;
        const template = document.createElement('template');
        template.innerHTML = html.trim();
        return template;
    }
    
    window.appState = {};
    let cats = document.getElementById('cat-list').textContent;
    let celebrations = document.getElementById('celebrationsData').textContent;
    if (cats) cats = JSON.parse(cats);
    if (celebrations) celebrations = JSON.parse(celebrations);
    
    if (cats && cats.data && Array.isArray(cats.data)) {
        window.appState.cats = cats.data.reduce((acc, cur) => ({ ...acc, [cur.id]: cur }), {});
    }
    if (celebrations && Array.isArray(celebrations)) {
        window.appState.celebrations = celebrations.reduce((acc, cur) => ({ ...acc, [cur.id]: cur }), {});
        window.appState.celebrationImages = celebrations.reduce((acc, cur) => {
            return {
                ...acc,
                ...cur.gallery.reduce((acc, img) => ({ 
                    ...acc, 
                    [img.id]: img 
                }), {}),
                ...cur.options.reduce((acc, opt) => ({ 
                    ...acc, 
                    ...opt.gallery.reduce((acc, img) => ({ 
                        ...acc, 
                        [img.id]: img 
                    }), {}) 
                }), {})
            }
        }, {})
    }
    Object.freeze(window.appState);

    const catDialogElem = document.getElementById('cat-dialog');

    document.querySelectorAll('[data-cat-dialog-toggler]').forEach((elem) => {
        const id = elem.getAttribute('data-cat-dialog-toggler');
        const cat = window.appState.cats[id];
        if (cat && cat.summary)
            elem.addEventListener('click', (event) => {
                event.preventDefault();
                catDialogElem.open(cat);
            })
    })

    customElements.define(
        'x-cat-popup',
        class extends HTMLElement {
            
            get template() {
                return _html(`
                
                    <link href="http://localhost/wordpress/wp-content/themes/CatCaffee/css/bootstrap.min.css" rel="stylesheet">
                    <link href="http://localhost/wordpress/wp-content/themes/CatCaffee/css/full-spoon.css" rel="stylesheet">
                    <style>
                        .popup {
                            display: none;
                            position: fixed;
                            top: 0; bottom: 0;
                            left: 0; right: 0;
                            background: #000000ad;
                            z-index: 1200;
                            overflow: auto;
                        }
                        .popup-paranja {
                            position: absolute;
                            top: 0; bottom: 0;
                            left: 0; right: 0;
                        }
                        .popup.show {
                            display: flex;
                        }
                        .popup-modal {
                            max-width: 480px;
                            min-width: 320px;
                            margin: 10vh auto auto;
                            position: relative;
                            background: #fff;
                        }
                        .popup-content {
                            padding: 12px 24px;
                        }
                        .close {
                            position: absolute;
                            top: -24px; right: -24px;
                            background: #ffffff78;
                            border-radius: 50%;
                            width: 20px; height: 20px;
                            display: flex;
                            cursor: pointer;
                        }
                        .close::after {
                            content: '';
                            background: #000000d4;
                            clip-path: polygon(20% 0%, 0% 20%, 30% 50%, 0% 80%, 20% 100%, 50% 70%, 80% 100%, 100% 80%, 70% 50%, 100% 20%, 80% 0%, 50% 30%);
                            display: block;
                            width: 75%;
                            height: 75%;
                            margin: auto;
                        }
                        header {
                            border-bottom: 1px solid transparent;
                            border-top-left-radius: 0;
                            border-top-right-radius: 0;
                        }
                        header img {
                            display: block;
                            max-width: 100%;
                        }
                        @media (max-width: 520px) {
                            .popup-modal {
                                margin-top: 0;
                            }
                            .close {
                                right: auto; top: 4px; left: 4px;
                            }
                        }
                    </style>
                    <div class="popup ${this.show ? 'show' : ''}">
                        <div class="popup-paranja" id="paranja"></div>
                        <div class="popup-modal">
                            <i class="close" id="close-btn"></i>
                            <header>
                                ${this.image ? `
                                    <img alt="${this.name}" src="http://localhost/wordpress/wp-content/themes/CatCaffee/images/${this.image}" />
                                ` : ''}
                            </header>
                            <div class="popup-content">
                                <h4>${this.name}</h4>
                                <div>${this.summary ? marked.marked(this.summary) : ''}</div>
                            </div>
                        </div>
                    </div>
                `)
            }

            rendered = false;
            name = '';
            summary = '';
            image = '';
            show = false;

            constructor() {
                super();
                this.attachShadow({mode: 'open'})
                    .appendChild(this.template.content.cloneNode(true));
                this.shadowRoot.addEventListener('click', (event) => {
                    if (event.target === this.shadowRoot.getElementById('paranja')) {
                        this.close();
                    }
                })
            }

            static get observedAttributes () {
                return ['show'];
            }

            attributeChangedCallback(name, prev, value) {
                if (name === 'show' && value === 'true') {
                    this.show = true;
                } else {
                    this.show = false;
                }
                this.render();
            }

            connectedCallback() {
                if (!this.rendered) {
                    this.render();
                    this.rendered = true;
                }
            }

            render() {
                this.shadowRoot.innerHTML = this.template.innerHTML;
                this.shadowRoot.getElementById('close-btn').onclick = this.close.bind(this);
            }

            close() {
                this.name = '';
                this.cat_image = '';
                this.summary = '';
                document.body.classList.remove('modal-open');
                this.setAttribute('show', 'false');
            }

            open({ name, cat_image, summary }) {
                this.name = name;
                this.image = cat_image;
                this.summary = summary;
                document.body.classList.add('modal-open');
                this.setAttribute('show', 'true');
            }
        }
    )

    const celebrationPopupEl = document.getElementById('celebration-popup');

    document.querySelectorAll('[data-celebration-dialog-toggler]').forEach((elem) => {
        const id = elem.getAttribute('data-celebration-dialog-toggler');
        const item = window.appState.celebrations[id];
        if (item)
            elem.addEventListener('click', (event) => {
                event.preventDefault();
                celebrationPopupEl.open(item);
            })
    })

    class CelebrationGallery {
        imgs = []
        current = null

        get selectedImage()
        {
            if (this.current && this.imgs.length) {
                return this.imgs.find((img) => img.id === this.current)
            }
            return {};
        }

        constructor(imgs = []) {
            this.imgs = imgs.map((i = { id: null, url: '', title: '' }) => ({ 
                id: i.id, 
                url: i.url, 
                title: i.title
            }));
            if (this.imgs.length) {
                this.current = this.imgs[0].id
            }
        }

        render() {
            return `
                <div class="gallery" data-gallery>
                    <div src="${this.selectedImage.url}" 
                         alt="${this.selectedImage.title}" 
                         data-gallery-current
                         style="background-image: url('${this.selectedImage.url}')"
                         class="gallery-current"></div>
                    <div class="gallery-thumbs-list">
                        ${ this.imgs.reduce((acc, cur) => (`
                            ${acc}
                            <div class="gallery-thumb ${this.selectedImage.id === cur.id ? 'is-active' : ''}" 
                                 data-thumb-id="${cur.id}" 
                                 alt="${cur.title}" 
                                 style="background-image: url('${cur.url}')"></div>
                        `), '')}
                    </div>
                </div>
            `
        }
    }

    class CelebrationOptions {
        options = []

        constructor(options = [])
        {
            this.options = options.map((opt = {title: '', summary: '', gallery: []}) => ({
                title: opt.title,
                summary: opt.summary,
                gallery: new CelebrationGallery(opt.gallery)
            }));
        }

        render() {
            return this.options.reduce((acc, cur) => (`
            ${acc}
            <div class="option-item">
                <h1>${cur.title}</h1>
                <div>${cur.summary ? marked(cur.summary) : ''}</div>
                ${cur.gallery.render()}
            </div>
            `), '');
        }
    }

    customElements.define(
        'x-celebration-popup',
        class extends HTMLElement {
            
            get template() {
                return _html(`
                    <link href="http://localhost/wordpress/wp-content/themes/CatCaffee/css/bootstrap.min.css" rel="stylesheet">
                    <link href="http://localhost/wordpress/wp-content/themes/CatCaffee/css/full-spoon.css" rel="stylesheet">
                    <style>
                        .popup {
                            display: none;
                            position: fixed;
                            top: 0; bottom: 0;
                            left: 0; right: 0;
                            background: #000000ad;
                            z-index: 1200;
                            overflow: auto;
                        }
                        .popup-paranja {
                            position: absolute;
                            top: 0; bottom: 0;
                            left: 0; right: 0;
                        }
                        .popup.show {
                            display: flex;
                        }
                        .popup-modal {
                            max-width: 1200px;
                            min-width: 320px;
                            margin: 10vh auto auto;
                            position: relative;
                            background: #fff;
                        }
                        .popup-content {
                            padding: 36px 24px;
                            position: relative;
                            background-attachment: scroll;
                            background-image: url(http://localhost/wordpress/wp-content/themes/CatCaffee/images/menu-inner-bg.jpg);
                            background-position: center center;
                            background-repeat: repeat;
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            background-size: contain;
                        }
                        .close {
                            position: absolute;
                            top: -24px; right: -24px;
                            background: #ffffff78;
                            border-radius: 50%;
                            width: 20px; height: 20px;
                            display: flex;
                            cursor: pointer;
                            z-index: 1400;
                        }
                        .close::after {
                            content: '';
                            background: #000000d4;
                            clip-path: polygon(20% 0%, 0% 20%, 30% 50%, 0% 80%, 20% 100%, 50% 70%, 80% 100%, 100% 80%, 70% 50%, 100% 20%, 80% 0%, 50% 30%);
                            display: block;
                            width: 75%;
                            height: 75%;
                            margin: auto;
                        }
                        @media (max-width: 520px) {
                            .popup-modal {
                                margin-top: 0;
                            }
                            .close {
                                right: auto; top: 4px; left: 4px;
                            }
                        }

                        .options {
                            padding: 24px 0 24px 24px;
                        }

                        .gallery {
                            margin-top: 56px;
                            margin-bottom: 24px;
                        }
                        .gallery-current {
                            display: block;
                            max-width: 100%;
                            margin-bottom: 24px;
                            height: 520px;
                            background-repeat: no-repeat;
                            background-position: center;
                            background-size: contain;
                        }
                        .gallery-thumbs-list {
                            display: flex;
                            flex-wrap: wrap;
                            margin-left: -15px;
                            margin-right: -15px;
                        }
                        .gallery-thumb {
                            background-repeat: no-repeat;
                            background-repeat: no-repeat;
                            height: 100px;
                            width: 100px;
                            background-size: cover;
                            background-position: center;
                            cursor: pointer;
                            margin: 15px;
                            border: 1px solid #00000075;
                            box-shadow: 0px 0px 0px #000000ff;
                            transition: all 0.25s linear;
                        }
                        .gallery-thumb:not(.is-active):hover {
                            box-shadow: 0px 0px 4px #03030375;
                        }
                        .gallery-thumb.is-active {
                            position: relative;
                        }
                        .gallery-thumb.is-active::after {
                            content: '';
                            position: absolute;
                            top: 0; bottom: 0;
                            right: 0; left: 0;
                            background: #00000075;
                        }
                    </style>

                    <div class="popup ${this.show ? 'show' : ''}">
                        <div class="popup-paranja" id="paranja"></div>
                        <div class="popup-modal">
                            <i class="close" id="close-btn"></i>
                            <section class="popup-content">
                                <h2 class="section-heading">${this.title}</h2>
                                <div>${this.summary ? marked(this.summary) : ''}</div>
                                <div class="item-gallery">
                                    ${this.gallery.render()}
                                </div>
                                <div><b>Доступны следующие опции:</b></div>
                                <div class="options">
                                    ${this.options.render()}
                                </div>
                            </section>
                        </div>
                    </div>
                `)
            }

            rendered = false;
            title = '';
            summary = '';
            options = new CelebrationOptions;
            gallery = new CelebrationGallery;
            show = false;

            constructor() {
                super();
                this.attachShadow({mode: 'open'})
                    .appendChild(this.template.content.cloneNode(true));
                this.shadowRoot.addEventListener('click', (event) => {
                    if (event.target === this.shadowRoot.getElementById('paranja')) {
                        this.close();
                    }
                })
            }

            static get observedAttributes () {
                return ['show'];
            }

            attributeChangedCallback(name, prev, value) {
                if (name === 'show' && value === 'true') {
                    this.show = true;
                } else {
                    this.show = false;
                }
                this.render();
            }

            connectedCallback() {
                if (!this.rendered) {
                    this.render();
                    this.rendered = true;
                }
            }

            render() {
                this.shadowRoot.innerHTML = this.template.innerHTML;
                
                this.shadowRoot.getElementById('close-btn').onclick = this.close.bind(this);
                
                this.shadowRoot.querySelectorAll('[data-gallery]').forEach((gallery) => {
                    const currentEl = gallery.querySelector('[data-gallery-current]');
                    gallery.querySelectorAll('[data-thumb-id]').forEach((thumb) => {
                        thumb.addEventListener('click', (event) => {
                            if (event.target.classList.contains('is-active')) return;
                            const 
                                id = event.target.getAttribute('data-thumb-id'),
                                img = id ? window.appState.celebrationImages[id] : null
                            ;
                            if (img && img.url) {
                                currentEl.style.backgroundImage = `url(${img.url})`;
                                gallery.querySelector('[data-thumb-id].is-active').classList.remove('is-active');
                                event.target.classList.add('is-active');
                            }
                        })

                    })
                });
            }

            close() {
                this.title = '';
                this.summary = '';
                this.options = new CelebrationOptions;
                this.gallery = new CelebrationGallery;
                document.body.classList.remove('modal-open');
                this.setAttribute('show', 'false');
            }

            open({ title, summary, options, gallery }) {
                this.title = title;
                this.summary = summary;
                this.options = new CelebrationOptions(options);
                this.gallery = new CelebrationGallery(gallery);
                document.body.classList.add('modal-open');
                this.setAttribute('show', 'true');
            }
        }
    )
});

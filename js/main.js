/**
 * Interactions premium COSM'ETHIQUE.
 */

document.addEventListener('DOMContentLoaded', () => {
    const i18n = window.cosmethiqueI18n || {};
    const translateUi = (key, fallback = key) => (i18n.ui && i18n.ui[key]) || fallback;
    const translateDiagnostic = (key, fallback = key) => (i18n.diagnostic && i18n.diagnostic[key]) || fallback;
    const formatTranslated = (text, values = []) => values.reduce(
        (formatted, value, index) => formatted.replace(new RegExp(`%${index + 1}\\$[sd]`, 'g'), value),
        text
    );

    if (i18n.dir) {
        document.documentElement.setAttribute('dir', i18n.dir);
    }

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    document.body.classList.add('cosmethique-page-ready');

    if (!prefersReducedMotion) {
        const pageLinks = document.querySelectorAll('a[href]');
        pageLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                const href = link.getAttribute('href') || '';

                if (
                    event.defaultPrevented ||
                    event.metaKey ||
                    event.ctrlKey ||
                    event.shiftKey ||
                    event.altKey ||
                    link.target ||
                    link.hasAttribute('download') ||
                    href.startsWith('#') ||
                    href.startsWith('mailto:') ||
                    href.startsWith('tel:') ||
                    link.classList.contains('ajax_add_to_cart')
                ) {
                    return;
                }

                const url = new URL(link.href, window.location.href);

                if (url.origin !== window.location.origin || url.href === window.location.href) {
                    return;
                }

                event.preventDefault();
                document.body.classList.add('cosmethique-page-leaving');
                window.setTimeout(() => {
                    window.location.href = url.href;
                }, 260);
            });
        });
    }

    const menuButton = document.querySelector('.mobile-menu-toggle');
    const navigation = document.querySelector('.site-navigation');

    if (menuButton && navigation) {
        menuButton.addEventListener('click', () => {
            const isOpen = navigation.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
        });

        navigation.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                navigation.classList.remove('is-open');
                menuButton.setAttribute('aria-expanded', 'false');
            });
        });
    }

    const languageSwitchers = document.querySelectorAll('[data-language-switcher]');

    const closeLanguageSwitchers = (except = null) => {
        languageSwitchers.forEach((switcher) => {
            if (switcher === except) {
                return;
            }

            const toggle = switcher.querySelector('.language-switcher-toggle');
            const menu = switcher.querySelector('.language-switcher-menu');

            switcher.classList.remove('is-open');

            if (toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            }

            if (menu) {
                menu.hidden = true;
            }
        });
    };

    languageSwitchers.forEach((switcher) => {
        const toggle = switcher.querySelector('.language-switcher-toggle');
        const menu = switcher.querySelector('.language-switcher-menu');
        const options = Array.from(switcher.querySelectorAll('.language-switcher-option'));

        if (!toggle || !menu || !options.length) {
            return;
        }

        toggle.addEventListener('click', () => {
            const isOpen = !switcher.classList.contains('is-open');

            closeLanguageSwitchers(switcher);
            switcher.classList.toggle('is-open', isOpen);
            toggle.setAttribute('aria-expanded', String(isOpen));
            menu.hidden = !isOpen;

            if (isOpen) {
                const activeOption = options.find((option) => option.classList.contains('is-active')) || options[0];
                activeOption.focus({ preventScroll: true });
            }
        });

        options.forEach((option) => {
            option.addEventListener('click', () => {
                const code = option.dataset.languageCode;

                if (code) {
                    try {
                        window.localStorage.setItem('cosmethique_lang', code);
                    } catch (error) {
                        // La préférence reste mémorisée via cookie si le stockage local est bloqué.
                    }

                    document.cookie = `cosmethique_lang=${encodeURIComponent(code)}; path=/; max-age=31536000; SameSite=Lax`;
                }
            });
        });

        switcher.addEventListener('keydown', (event) => {
            const currentIndex = options.indexOf(document.activeElement);

            if (event.key === 'Escape') {
                event.preventDefault();
                closeLanguageSwitchers();
                toggle.focus({ preventScroll: true });
            }

            if (event.key === 'ArrowDown') {
                event.preventDefault();
                const nextIndex = currentIndex < 0 ? 0 : (currentIndex + 1) % options.length;
                options[nextIndex].focus({ preventScroll: true });
            }

            if (event.key === 'ArrowUp') {
                event.preventDefault();
                const nextIndex = currentIndex < 0 ? options.length - 1 : (currentIndex - 1 + options.length) % options.length;
                options[nextIndex].focus({ preventScroll: true });
            }
        });
    });

    document.addEventListener('click', (event) => {
        if (!event.target.closest('[data-language-switcher]')) {
            closeLanguageSwitchers();
        }
    });

    const smartSearchForms = document.querySelectorAll('[data-smart-search]');

    const normalizeSearch = (text = '') => text
        .toString()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/[^a-z0-9]+/gi, ' ')
        .trim()
        .toLowerCase();

    const escapeHtml = (text = '') => text
        .toString()
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');

    const highlightSearchTerm = (text = '', query = '') => {
        const originalText = text.toString();
        const tokens = normalizeSearch(query).split(' ').filter((token) => token.length > 1);

        if (!tokens.length) {
            return escapeHtml(originalText);
        }

        let normalizedText = '';
        const indexMap = [];

        Array.from(originalText).forEach((character, characterIndex) => {
            Array.from(normalizeSearch(character)).forEach((normalizedCharacter) => {
                normalizedText += normalizedCharacter;
                indexMap.push(characterIndex);
            });
        });

        const ranges = [];

        tokens.forEach((token) => {
            let start = normalizedText.indexOf(token);

            while (start !== -1) {
                const end = start + token.length - 1;
                ranges.push([indexMap[start], indexMap[end] + 1]);
                start = normalizedText.indexOf(token, start + token.length);
            }
        });

        if (!ranges.length) {
            return escapeHtml(originalText);
        }

        ranges.sort((a, b) => a[0] - b[0]);

        const mergedRanges = ranges.reduce((merged, range) => {
            const previous = merged[merged.length - 1];

            if (previous && range[0] <= previous[1]) {
                previous[1] = Math.max(previous[1], range[1]);
            } else {
                merged.push(range);
            }

            return merged;
        }, []);

        let html = '';
        let cursor = 0;

        mergedRanges.forEach(([start, end]) => {
            html += escapeHtml(originalText.slice(cursor, start));
            html += `<mark>${escapeHtml(originalText.slice(start, end))}</mark>`;
            cursor = end;
        });

        return html + escapeHtml(originalText.slice(cursor));
    };

    smartSearchForms.forEach((form) => {
        const input = form.querySelector('input[type="search"]');
        const panel = form.querySelector('.smart-search-panel');
        const resultsNode = form.querySelector('.smart-search-results');
        const statusNode = form.querySelector('.smart-search-status');
        const config = window.cosmethiqueSearch || {};
        const minChars = Number(config.minChars || 2);
        const labels = config.labels || {};
        let results = [];
        let activeIndex = -1;
        let debounceTimer = null;
        let controller = null;

        if (!input || !panel || !resultsNode || !config.ajaxUrl || !config.nonce) {
            return;
        }

        const setOpen = (isOpen) => {
            panel.hidden = !isOpen;
            input.setAttribute('aria-expanded', String(isOpen));
            form.classList.toggle('is-search-open', isOpen);
        };

        const closeSearch = () => {
            setOpen(false);
            activeIndex = -1;
            input.removeAttribute('aria-activedescendant');
        };

        const setStatus = (message = '') => {
            if (statusNode) {
                statusNode.textContent = message;
            }
        };

        const updateActive = (nextIndex) => {
            const options = Array.from(resultsNode.querySelectorAll('.smart-search-item'));

            if (!options.length) {
                activeIndex = -1;
                input.removeAttribute('aria-activedescendant');
                return;
            }

            activeIndex = (nextIndex + options.length) % options.length;

            options.forEach((option, index) => {
                const isActive = index === activeIndex;
                option.classList.toggle('is-active', isActive);
                option.setAttribute('aria-selected', String(isActive));
            });

            input.setAttribute('aria-activedescendant', options[activeIndex].id);
            options[activeIndex].scrollIntoView({ block: 'nearest' });
        };

        const renderNoResults = () => {
            const links = Array.isArray(config.noResultLinks) ? config.noResultLinks : [];
            const linksHtml = links.map((link) => (
                `<a href="${escapeHtml(link.url)}">${escapeHtml(link.label)}</a>`
            )).join('');

            resultsNode.innerHTML = `
                <div class="smart-search-empty">
                    <p>${escapeHtml(labels.noResults || 'Aucun résultat trouvé. Découvrez nos catégories principales.')}</p>
                    <div class="smart-search-empty-links">${linksHtml}</div>
                </div>
            `;
            setStatus(labels.noResults || '');
            setOpen(true);
        };

        const renderResults = (items, query) => {
            results = Array.isArray(items) ? items : [];
            activeIndex = -1;

            if (!results.length) {
                renderNoResults();
                return;
            }

            resultsNode.innerHTML = results.map((item, index) => {
                const imageHtml = item.image
                    ? `<img src="${escapeHtml(item.image)}" alt="" loading="lazy">`
                    : `<span class="smart-search-icon" aria-hidden="true">${escapeHtml((item.type || labels.page || 'Page').charAt(0))}</span>`;
                const meta = [item.meta, item.price].filter(Boolean).join(' · ');

                return `
                    <a class="smart-search-item" id="smart-search-option-${index}" href="${escapeHtml(item.url)}" role="option" aria-selected="false">
                        <span class="smart-search-thumb">${imageHtml}</span>
                        <span class="smart-search-copy">
                            <span class="smart-search-type">${escapeHtml(item.type || labels.suggestions || 'Suggestion')}</span>
                            <strong>${highlightSearchTerm(item.title || '', query)}</strong>
                            ${meta ? `<small>${escapeHtml(meta)}</small>` : ''}
                        </span>
                    </a>
                `;
            }).join('');

            setStatus(`${results.length} ${labels.suggestions || 'suggestions'}`);
            setOpen(true);
        };

        const findRouteUrl = (query) => {
            const normalizedQuery = normalizeSearch(query);
            const routes = Array.isArray(config.routes) ? config.routes : [];

            if (!normalizedQuery) {
                return '';
            }

            const exactRoute = routes.find((route) => (
                Array.isArray(route.keywords)
                && route.keywords.some((keyword) => normalizeSearch(keyword) === normalizedQuery)
            ));

            if (exactRoute) {
                return exactRoute.url;
            }

            const looseRoute = routes.find((route) => (
                Array.isArray(route.keywords)
                && route.keywords.some((keyword) => {
                    const normalizedKeyword = normalizeSearch(keyword);
                    return normalizedKeyword && (
                        normalizedKeyword.includes(normalizedQuery)
                        || normalizedQuery.includes(normalizedKeyword)
                    );
                })
            ));

            return looseRoute ? looseRoute.url : '';
        };

        const runSearch = (query) => {
            const normalizedQuery = normalizeSearch(query);

            if (normalizedQuery.length < minChars) {
                closeSearch();
                return;
            }

            if (controller) {
                controller.abort();
            }

            controller = new AbortController();
            setStatus(labels.loading || 'Recherche en cours…');
            setOpen(true);
            resultsNode.innerHTML = '<div class="smart-search-loading" aria-hidden="true"></div>';

            const params = new URLSearchParams({
                action: 'theme_perso_smart_search',
                nonce: config.nonce,
                term: query,
            });

            fetch(`${config.ajaxUrl}?${params.toString()}`, {
                signal: controller.signal,
                credentials: 'same-origin',
            })
                .then((response) => response.json())
                .then((payload) => {
                    if (!payload || !payload.success) {
                        renderNoResults();
                        return;
                    }

                    renderResults(payload.data?.results || [], query);
                })
                .catch((error) => {
                    if (error.name !== 'AbortError') {
                        renderNoResults();
                    }
                });
        };

        input.addEventListener('input', () => {
            window.clearTimeout(debounceTimer);
            debounceTimer = window.setTimeout(() => runSearch(input.value), 220);
        });

        input.addEventListener('focus', () => {
            if (results.length) {
                setOpen(true);
            } else if (normalizeSearch(input.value).length >= minChars) {
                runSearch(input.value);
            }
        });

        form.addEventListener('submit', (event) => {
            const directUrl = findRouteUrl(input.value);
            const activeOption = activeIndex >= 0 ? resultsNode.querySelectorAll('.smart-search-item')[activeIndex] : null;

            if (activeOption) {
                event.preventDefault();
                window.location.href = activeOption.href;
                return;
            }

            if (directUrl) {
                event.preventDefault();
                window.location.href = directUrl;
            }
        });

        form.addEventListener('keydown', (event) => {
            if (panel.hidden && ['ArrowDown', 'ArrowUp', 'Escape'].includes(event.key)) {
                return;
            }

            if (event.key === 'Escape') {
                event.preventDefault();
                closeSearch();
            }

            if (event.key === 'ArrowDown') {
                event.preventDefault();
                updateActive(activeIndex + 1);
            }

            if (event.key === 'ArrowUp') {
                event.preventDefault();
                updateActive(activeIndex - 1);
            }
        });

        document.addEventListener('click', (event) => {
            if (!form.contains(event.target)) {
                closeSearch();
            }
        });
    });

    const demoMessages = {
        contact: `Bonjour,

Je souhaiterais obtenir des conseils concernant une routine adaptée à une peau mixte avec quelques imperfections.

Pouvez-vous me recommander les produits Cosm'Éthique les plus adaptés ?

Merci d'avance.

Cordialement,

Sophie Martin`,
        franchise: `Bonjour,

Je suis intéressé par l'ouverture d'une franchise Cosm'Éthique à Lyon.

Je souhaiterais recevoir davantage d'informations concernant les conditions d'ouverture, l'investissement nécessaire ainsi que le processus d'accompagnement proposé.

Je reste disponible pour un échange.

Cordialement,

Thomas Bernard`,
    };

    const normaliseText = (text = '') => text
        .toString()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .toLowerCase();

    const getFieldContext = (field) => {
        const safeId = field.id && window.CSS?.escape ? CSS.escape(field.id) : field.id;
        const label = safeId ? document.querySelector(`label[for="${safeId}"]`) : null;
        const wrappedLabel = field.closest('label');
        const row = field.closest('.form-row, .wpforms-field, .wpcf7-form-control-wrap, p');
        return normaliseText([
            field.name,
            field.id,
            field.getAttribute('autocomplete'),
            field.getAttribute('placeholder'),
            field.getAttribute('aria-label'),
            label?.textContent,
            wrappedLabel?.textContent,
            row?.textContent,
        ].filter(Boolean).join(' '));
    };

    const isEditableDemoField = (field) => {
        if (!field || field.disabled || field.readOnly) {
            return false;
        }

        const type = (field.type || '').toLowerCase();
        const name = normaliseText(field.name || '');

        return !['hidden', 'submit', 'button', 'reset', 'file'].includes(type)
            && !name.includes('recaptcha')
            && !name.includes('nonce')
            && !name.includes('honeypot')
            && !name.includes('website')
            && !name.includes('orderby')
            && !name.includes('paged');
    };

    const fieldMatches = (field, patterns) => {
        const context = getFieldContext(field);
        return patterns.some((pattern) => pattern.test(context));
    };

    const clearDemoPlaceholder = (field) => {
        if (field.dataset.demoPlaceholderActive !== 'true') {
            return;
        }

        field.value = '';
        field.dataset.demoPlaceholderActive = 'false';
        field.classList.remove('is-demo-placeholder');
        field.dispatchEvent(new Event('input', { bubbles: true }));
        field.dispatchEvent(new Event('change', { bubbles: true }));
    };

    const restoreDemoPlaceholder = (field) => {
        if (!isEditableDemoField(field) || field.value.trim() || !field.dataset.demoPlaceholderValue) {
            return;
        }

        field.value = field.dataset.demoPlaceholderValue;
        field.dataset.demoPlaceholderActive = 'true';
        field.classList.add('is-demo-placeholder');
        field.dispatchEvent(new Event('input', { bubbles: true }));
        field.dispatchEvent(new Event('change', { bubbles: true }));
    };

    const bindDemoPlaceholder = (field) => {
        if (field.dataset.demoPlaceholderBound === 'true') {
            return;
        }

        field.dataset.demoPlaceholderBound = 'true';

        field.addEventListener('focus', () => clearDemoPlaceholder(field));

        field.addEventListener('blur', () => {
            if (!field.value.trim()) {
                restoreDemoPlaceholder(field);
            } else if (field.value !== field.dataset.demoPlaceholderValue) {
                field.dataset.demoPlaceholderActive = 'false';
                field.classList.remove('is-demo-placeholder');
            }
        });

        field.addEventListener('input', () => {
            if (field.value && field.value !== field.dataset.demoPlaceholderValue) {
                field.dataset.demoPlaceholderActive = 'false';
                field.classList.remove('is-demo-placeholder');
            }
        });
    };

    const setDemoValue = (field, value) => {
        if (!isEditableDemoField(field)) {
            return false;
        }

        if (field.dataset.demoPlaceholderValue) {
            return false;
        }

        if (field.dataset.demoPlaceholderActive !== 'true' && field.value) {
            return false;
        }

        const applyValue = (demoValue) => {
            field.dataset.demoPlaceholderValue = demoValue;
            field.dataset.demoPlaceholderActive = 'true';
            field.classList.add('is-demo-placeholder');
            bindDemoPlaceholder(field);
            field.dispatchEvent(new Event('input', { bubbles: true }));
            field.dispatchEvent(new Event('change', { bubbles: true }));
            return true;
        };

        if (field.tagName === 'SELECT') {
            const expected = normaliseText(value);
            const option = Array.from(field.options).find((item) => normaliseText(`${item.value} ${item.textContent}`).includes(expected));

            if (option) {
                field.value = option.value;
                return applyValue(option.value);
            }

            return false;
        }

        if (field.type === 'checkbox' || field.type === 'radio') {
            return false;
        }

        field.value = value;
        return applyValue(value);
    };

    const fillFirstMatchingField = (container, patterns, value) => {
        const fields = Array.from(container.querySelectorAll('input, textarea, select'));
        const field = fields.find((item) => isEditableDemoField(item) && fieldMatches(item, patterns));
        return field ? setDemoValue(field, value) : false;
    };

    const fillAllMatchingFields = (container, patterns, value) => {
        Array.from(container.querySelectorAll('input, textarea, select'))
            .filter((item) => isEditableDemoField(item) && fieldMatches(item, patterns))
            .forEach((field) => setDemoValue(field, value));
    };

    const fillContactDemoForm = (container) => {
        fillFirstMatchingField(container, [/prenom|first.?name|given.?name/], 'Sophie');
        fillFirstMatchingField(container, [/nom(?!.*utilisateur)|last.?name|family.?name|your.?name|name/], 'Martin');
        fillFirstMatchingField(container, [/e-?mail|email|courriel/], 'sophie.martin@email.com');
        fillFirstMatchingField(container, [/telephone|phone|tel/], '06 24 58 71 39');
        fillFirstMatchingField(container, [/sujet|subject|objet/], 'Conseil sur une routine beauté');
        fillFirstMatchingField(container, [/message|commentaire|your.?message/], demoMessages.contact);
    };

    const fillFranchiseDemoForm = (container) => {
        fillFirstMatchingField(container, [/nom.?complet|full.?name|your.?name|name/], 'Thomas Bernard');
        fillFirstMatchingField(container, [/e-?mail|email|courriel/], 'thomas.bernard@email.com');
        fillFirstMatchingField(container, [/telephone|phone|tel/], '06 71 48 92 35');
        fillFirstMatchingField(container, [/ville.?souhaitee|city|ville/], 'Lyon');
        fillFirstMatchingField(container, [/apport|invest|budget|capital/], '180 000 €');
        fillFirstMatchingField(container, [/surface|local|m2|m²/], '120 m²');
        fillFirstMatchingField(container, [/experience|professionnelle|retail|beaute/], 'Responsable de magasin spécialisé dans les produits de bien-être depuis 8 ans.');
        fillFirstMatchingField(container, [/message|commentaire|demande/], demoMessages.franchise);

    };

    const fillAccountDemoForm = (container) => {
        fillAllMatchingFields(container, [/billing_first_name|shipping_first_name|account_first_name|first.?name|prenom|given.?name/], 'Sophie');
        fillAllMatchingFields(container, [/billing_last_name|shipping_last_name|account_last_name|last.?name|nom(?!.*utilisateur)|family.?name/], 'Martin');
        fillFirstMatchingField(container, [/account_display_name|display.?name|nom.?affiche|pseudo/], 'Sophie Martin');
        fillAllMatchingFields(container, [/username|user_login|account_username|nom.?utilisateur|identifiant/], 'sophiemartin');
        fillAllMatchingFields(container, [/billing_email|account_email|user_email|e-?mail|email|courriel/], 'sophie.martin@email.com');
        fillAllMatchingFields(container, [/billing_phone|telephone|phone|tel/], '06 24 58 71 39');
        fillAllMatchingFields(container, [/billing_address_1|shipping_address_1|adresse|address.?1|rue/], '12 Rue des Lilas');
        fillAllMatchingFields(container, [/billing_postcode|shipping_postcode|postcode|code.?postal|zip/], '75015');
        fillAllMatchingFields(container, [/billing_city|shipping_city|ville|city/], 'Paris');
        fillAllMatchingFields(container, [/billing_country|shipping_country|pays|country/], 'FR');

        Array.from(container.querySelectorAll('input[type="password"]'))
            .filter(isEditableDemoField)
            .forEach((field) => setDemoValue(field, '********'));
    };

    const fillGenericDemoForm = (container) => {
        fillFirstMatchingField(container, [/prenom|first.?name|given.?name/], 'Sophie');
        fillFirstMatchingField(container, [/nom(?!.*utilisateur)|last.?name|family.?name|name/], 'Martin');
        fillFirstMatchingField(container, [/username|user_login|nom.?utilisateur|identifiant/], 'sophiemartin');
        fillFirstMatchingField(container, [/e-?mail|email|courriel|newsletter/], 'sophie.martin@email.com');
        fillFirstMatchingField(container, [/telephone|phone|tel/], '06 24 58 71 39');
        fillFirstMatchingField(container, [/sujet|subject|objet/], 'Conseil sur une routine beauté');
        fillFirstMatchingField(container, [/ville|city/], 'Paris');
        fillFirstMatchingField(container, [/pays|country/], 'France');
        fillFirstMatchingField(container, [/adresse|address.?1|rue/], '12 Rue des Lilas');
        fillFirstMatchingField(container, [/code.?postal|postcode|zip/], '75015');
        fillFirstMatchingField(container, [/message|commentaire|comment|note/], 'Bonjour, je souhaite obtenir des informations concernant les soins Cosm’Éthique les plus adaptés à ma routine.');

        Array.from(container.querySelectorAll('input[type="password"]'))
            .filter(isEditableDemoField)
            .forEach((field) => setDemoValue(field, '********'));
    };

    const applyDemoAutofill = () => {
        document.querySelectorAll('[data-demo-autofill="contact"]').forEach(fillContactDemoForm);
        document.querySelectorAll('[data-demo-autofill="franchise"]').forEach(fillFranchiseDemoForm);

        const path = window.location.pathname;
        if (/contact/i.test(path)) {
            document.querySelectorAll('.wpcf7 form, .wpforms-form, form.cosmethique-form').forEach(fillContactDemoForm);
        }

        if (/devenir-franchise|franchise/i.test(path)) {
            document.querySelectorAll('.wpcf7 form, .wpforms-form, form.cosmethique-form').forEach(fillFranchiseDemoForm);
        }

        if (document.body.classList.contains('woocommerce-account') || /mon-compte|my-account/i.test(path)) {
            document.querySelectorAll('form.woocommerce-form, form.woocommerce-EditAccountForm, form.woocommerce-address-fields, .woocommerce-account form').forEach(fillAccountDemoForm);
        }

        document.querySelectorAll('form').forEach(fillGenericDemoForm);

        document.querySelectorAll('form').forEach((form) => {
            if (form.dataset.demoPlaceholderSubmitBound === 'true') {
                return;
            }

            form.dataset.demoPlaceholderSubmitBound = 'true';
            form.addEventListener('submit', () => {
                form.querySelectorAll('.is-demo-placeholder[data-demo-placeholder-active="true"]').forEach((field) => {
                    if (field.value === field.dataset.demoPlaceholderValue) {
                        field.value = '';
                    }

                    field.classList.remove('is-demo-placeholder');
                    field.dataset.demoPlaceholderActive = 'false';
                });
            });
        });
    };

    applyDemoAutofill();
    window.setTimeout(applyDemoAutofill, 700);

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (event) => {
            const targetId = anchor.getAttribute('href');

            if (!targetId || targetId === '#') {
                return;
            }

            const target = document.querySelector(targetId);

            if (target) {
                event.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    const newsletterForms = document.querySelectorAll('.newsletter-form');
    newsletterForms.forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const button = form.querySelector('button');
            const input = form.querySelector('input[type="email"]');
            const status = form.querySelector('.newsletter-status');
            const buttonLabel = button ? button.querySelector('span') || button : null;

            if (!button || !input) {
                return;
            }

            if (!input.value || !input.checkValidity()) {
                form.classList.remove('is-success');
                form.classList.add('is-error');
                if (status) {
                    status.textContent = translateUi('newsletterError', 'Veuillez saisir une adresse email valide.');
                }
                input.focus();
                return;
            }

            const initialText = buttonLabel.textContent;
            form.classList.remove('is-error');
            form.classList.add('is-success');
            if (status) {
                status.textContent = translateUi('newsletterConfirmed', 'Inscription confirmée');
            }
            buttonLabel.textContent = translateUi('newsletterConfirmed', 'Inscription confirmée');
            button.disabled = true;

            window.setTimeout(() => {
                buttonLabel.textContent = initialText;
                button.disabled = false;
                input.value = '';
                form.classList.remove('is-success');
                if (status) {
                    status.textContent = '';
                }
            }, 2200);
        });
    });

    const categoryButtons = document.querySelectorAll('[data-category-filter]');
    const productCards = document.querySelectorAll('[data-product-categories]');

    productCards.forEach((card) => {
        card.addEventListener('click', (event) => {
            const interactiveElement = event.target.closest('a, button, input, select, textarea');

            if (!interactiveElement && card.dataset.productUrl) {
                window.location.href = card.dataset.productUrl;
            }
        });
    });

    categoryButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const selectedCategory = button.dataset.categoryFilter;

            categoryButtons.forEach((item) => {
                const isActive = item === button;
                item.classList.toggle('is-active', isActive);
                item.setAttribute('aria-selected', String(isActive));
            });

            productCards.forEach((card) => {
                const categories = (card.dataset.productCategories || '').split(' ');
                const shouldShow = selectedCategory === 'all' || categories.includes(selectedCategory);
                card.hidden = !shouldShow;
            });

            const productsSection = document.querySelector('.featured-products');
            if (productsSection) {
                productsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    const blogFilterButtons = document.querySelectorAll('[data-blog-filter]');
    const blogCards = document.querySelectorAll('[data-blog-card]');

    blogFilterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const selectedCategory = button.dataset.blogFilter;

            blogFilterButtons.forEach((item) => item.classList.toggle('is-active', item === button));

            blogCards.forEach((card) => {
                const shouldShow = selectedCategory === 'all' || card.dataset.blogCategory === selectedCategory;
                card.hidden = !shouldShow;
            });
        });
    });

    document.querySelectorAll('[data-shop-hero-slider]').forEach((slider) => {
        const slides = Array.from(slider.querySelectorAll('[data-shop-slide]'));
        const dots = Array.from(slider.querySelectorAll('[data-shop-slider-dot]'));
        const prev = slider.querySelector('[data-shop-slider-prev]');
        const next = slider.querySelector('[data-shop-slider-next]');
        let currentIndex = slides.findIndex((slide) => slide.classList.contains('is-active'));
        let autoplay = null;

        if (!slides.length) {
            return;
        }

        if (currentIndex < 0) {
            currentIndex = 0;
        }

        const goToSlide = (index) => {
            currentIndex = (index + slides.length) % slides.length;

            slides.forEach((slide, slideIndex) => {
                slide.classList.toggle('is-active', slideIndex === currentIndex);
            });

            dots.forEach((dot, dotIndex) => {
                dot.setAttribute('aria-current', String(dotIndex === currentIndex));
            });
        };

        const stopAutoplay = () => {
            if (autoplay) {
                window.clearInterval(autoplay);
                autoplay = null;
            }
        };

        const startAutoplay = () => {
            stopAutoplay();
            autoplay = window.setInterval(() => goToSlide(currentIndex + 1), 5000);
        };

        prev?.addEventListener('click', () => {
            goToSlide(currentIndex - 1);
            startAutoplay();
        });

        next?.addEventListener('click', () => {
            goToSlide(currentIndex + 1);
            startAutoplay();
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
                startAutoplay();
            });
        });

        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);
        slider.addEventListener('focusin', stopAutoplay);
        slider.addEventListener('focusout', startAutoplay);

        startAutoplay();
    });

    document.querySelectorAll('[data-copy-link]').forEach((button) => {
        button.addEventListener('click', async () => {
            const link = button.dataset.copyLink || window.location.href;
            const initialText = button.textContent;

            try {
                await navigator.clipboard.writeText(link);
                button.textContent = translateUi('copied', 'Copié');
            } catch (error) {
                button.textContent = translateUi('linkCopied', 'Lien copié');
            }

            window.setTimeout(() => {
                button.textContent = initialText;
            }, 1800);
        });
    });

    const getSavedShopScroll = () => {
        try {
            return window.sessionStorage.getItem('cosmethique_shop_scroll');
        } catch (error) {
            return null;
        }
    };

    const setSavedShopScroll = () => {
        try {
            window.sessionStorage.setItem('cosmethique_shop_scroll', String(window.scrollY));
        } catch (error) {
            return null;
        }

        return true;
    };

    const savedShopScroll = getSavedShopScroll();
    if (savedShopScroll) {
        try {
            window.sessionStorage.removeItem('cosmethique_shop_scroll');
        } catch (error) {
            // Storage may be unavailable in strict privacy modes.
        }

        window.requestAnimationFrame(() => {
            window.scrollTo(0, Number(savedShopScroll));
        });
    }

    const sortForms = document.querySelectorAll('[data-cosmethique-sort]');
    const closeSortMenu = (form) => {
        const toggle = form.querySelector('.cosmethique-sort-toggle');
        const menu = form.querySelector('.cosmethique-sort-menu');

        form.classList.remove('is-open');
        toggle?.setAttribute('aria-expanded', 'false');
        menu?.querySelectorAll('[role="option"]').forEach((option) => option.setAttribute('tabindex', '-1'));
    };

    sortForms.forEach((form) => {
        const toggle = form.querySelector('.cosmethique-sort-toggle');
        const menu = form.querySelector('.cosmethique-sort-menu');
        const valueInput = form.querySelector('[data-cosmethique-sort-value]');
        const label = form.querySelector('[data-cosmethique-sort-label]');
        const options = Array.from(form.querySelectorAll('[data-orderby]'));

        if (!toggle || !menu || !valueInput || !options.length) {
            return;
        }

        const openSortMenu = () => {
            form.classList.add('is-open');
            toggle.setAttribute('aria-expanded', 'true');
            options.forEach((option) => option.setAttribute('tabindex', '0'));
            (menu.querySelector('.is-selected') || options[0]).focus();
        };

        const toggleSortMenu = () => {
            if (form.classList.contains('is-open')) {
                closeSortMenu(form);
                toggle.focus();
            } else {
                openSortMenu();
            }
        };

        const submitSorting = (option) => {
            const orderby = option.dataset.orderby;

            if (!orderby) {
                return;
            }

            if (valueInput.value === orderby) {
                closeSortMenu(form);
                toggle.focus();
                return;
            }

            valueInput.value = orderby;
            if (label && option.dataset.label) {
                label.textContent = option.dataset.label;
            }

            options.forEach((item) => {
                const selected = item === option;
                item.classList.toggle('is-selected', selected);
                item.setAttribute('aria-selected', String(selected));
            });

            document.body.classList.add('cosmethique-sorting');
            setSavedShopScroll();
            window.setTimeout(() => form.submit(), 140);
        };

        toggle.addEventListener('click', toggleSortMenu);

        toggle.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowDown' || event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                openSortMenu();
            }
        });

        options.forEach((option, index) => {
            option.setAttribute('tabindex', '-1');

            option.addEventListener('click', () => submitSorting(option));
            option.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    event.preventDefault();
                    closeSortMenu(form);
                    toggle.focus();
                }

                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    submitSorting(option);
                }

                if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
                    event.preventDefault();
                    const direction = event.key === 'ArrowDown' ? 1 : -1;
                    const nextIndex = (index + direction + options.length) % options.length;
                    options[nextIndex].focus();
                }
            });
        });
    });

    document.addEventListener('click', (event) => {
        sortForms.forEach((form) => {
            if (!form.contains(event.target)) {
                closeSortMenu(form);
            }
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') {
            return;
        }

        sortForms.forEach((form) => {
            if (form.classList.contains('is-open')) {
                closeSortMenu(form);
                form.querySelector('.cosmethique-sort-toggle')?.focus();
            }
        });
    });

    const productGalleries = document.querySelectorAll('[data-cosmethique-gallery]');

    if (productGalleries.length) {
        let activeLightbox = null;

        const createGalleryLightbox = () => {
            const lightbox = document.createElement('div');
            lightbox.className = 'cosmethique-gallery-lightbox';
            lightbox.setAttribute('role', 'dialog');
            lightbox.setAttribute('aria-modal', 'true');
            lightbox.setAttribute('aria-label', translateUi('lightboxLabel', 'Image produit agrandie'));
            lightbox.innerHTML = `
                <button class="cosmethique-lightbox-close" type="button" aria-label="${translateUi('close', 'Fermer')}">x</button>
                <button class="cosmethique-lightbox-nav cosmethique-lightbox-prev" type="button" aria-label="${translateUi('previousImage', 'Image précédente')}">&lt;</button>
                <img class="cosmethique-lightbox-image" src="" alt="">
                <button class="cosmethique-lightbox-nav cosmethique-lightbox-next" type="button" aria-label="${translateUi('nextImage', 'Image suivante')}">&gt;</button>
            `;
            document.body.appendChild(lightbox);
            return lightbox;
        };

        const lightbox = document.querySelector('.cosmethique-gallery-lightbox') || createGalleryLightbox();
        const lightboxImage = lightbox.querySelector('.cosmethique-lightbox-image');
        const lightboxClose = lightbox.querySelector('.cosmethique-lightbox-close');
        const lightboxPrev = lightbox.querySelector('.cosmethique-lightbox-prev');
        const lightboxNext = lightbox.querySelector('.cosmethique-lightbox-next');

        const closeLightbox = () => {
            lightbox.classList.remove('is-visible');
            activeLightbox = null;
        };

        const showLightboxImage = (direction = 0) => {
            if (!activeLightbox || !lightboxImage) {
                return;
            }

            const { images } = activeLightbox;
            activeLightbox.index = (activeLightbox.index + direction + images.length) % images.length;
            const image = images[activeLightbox.index];
            lightboxImage.src = image.src;
            lightboxImage.alt = image.alt;
        };

        productGalleries.forEach((gallery) => {
            const main = gallery.querySelector('.cosmethique-gallery-main');
            const mainImage = gallery.querySelector('[data-gallery-main-image]');
            const thumbs = Array.from(gallery.querySelectorAll('[data-gallery-thumb]'));
            const images = thumbs.map((thumb) => ({
                src: thumb.dataset.gallerySrc,
                alt: thumb.dataset.galleryAlt || mainImage?.alt || '',
            })).filter((image) => image.src);
            let currentIndex = 0;
            let touchStartX = 0;

            if (!main || !mainImage || !images.length) {
                return;
            }

            const setGalleryImage = (index) => {
                currentIndex = (index + images.length) % images.length;
                const nextImage = images[currentIndex];

                main.classList.add('is-changing');
                window.setTimeout(() => {
                    mainImage.src = nextImage.src;
                    mainImage.alt = nextImage.alt;
                    main.classList.remove('is-changing');
                }, 160);

                thumbs.forEach((thumb, thumbIndex) => {
                    const isActive = thumbIndex === currentIndex;
                    thumb.classList.toggle('is-active', isActive);
                    thumb.setAttribute('aria-current', String(isActive));
                });
            };

            thumbs.forEach((thumb, index) => {
                thumb.addEventListener('click', () => setGalleryImage(index));
            });

            main.addEventListener('click', () => {
                activeLightbox = { images, index: currentIndex };
                showLightboxImage(0);
                lightbox.classList.add('is-visible');
                lightboxClose?.focus();
            });

            main.addEventListener('touchstart', (event) => {
                touchStartX = event.changedTouches[0]?.clientX || 0;
            }, { passive: true });

            main.addEventListener('touchend', (event) => {
                const touchEndX = event.changedTouches[0]?.clientX || 0;
                const diff = touchEndX - touchStartX;

                if (Math.abs(diff) > 42) {
                    setGalleryImage(currentIndex + (diff < 0 ? 1 : -1));
                }
            }, { passive: true });
        });

        lightboxClose?.addEventListener('click', closeLightbox);
        lightboxPrev?.addEventListener('click', () => showLightboxImage(-1));
        lightboxNext?.addEventListener('click', () => showLightboxImage(1));
        lightbox.addEventListener('click', (event) => {
            if (event.target === lightbox) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (!activeLightbox) {
                return;
            }

            if (event.key === 'Escape') {
                closeLightbox();
            }

            if (event.key === 'ArrowLeft') {
                showLightboxImage(-1);
            }

            if (event.key === 'ArrowRight') {
                showLightboxImage(1);
            }
        });
    }

    const syncCheckoutPaymentAccordion = () => {
        const methods = document.querySelectorAll('.woocommerce-checkout #payment .wc_payment_method');

        methods.forEach((method) => {
            const radio = method.querySelector('input[name="payment_method"]');
            const box = method.querySelector('.payment_box');
            const isOpen = !!radio?.checked;

            method.classList.toggle('is-payment-open', isOpen);
            radio?.setAttribute('aria-expanded', String(isOpen));

            if (!box) {
                return;
            }

            box.hidden = false;
            box.style.overflow = 'hidden';
            box.style.display = 'block';
            box.style.transition = 'max-height 250ms ease, opacity 250ms ease, margin 250ms ease, padding 250ms ease';

            if (isOpen) {
                box.style.maxHeight = `${box.scrollHeight + 32}px`;
                box.style.opacity = '1';
                box.style.marginTop = '14px';
            } else {
                box.style.maxHeight = '0px';
                box.style.opacity = '0';
                box.style.marginTop = '0px';
                window.setTimeout(() => {
                    const stillClosed = !method.querySelector('input[name="payment_method"]')?.checked;
                    if (stillClosed) {
                        box.hidden = true;
                        box.style.display = 'none';
                    }
                }, 260);
            }
        });
    };

    syncCheckoutPaymentAccordion();

    document.addEventListener('change', (event) => {
        if (event.target.matches('.woocommerce-checkout #payment input[name="payment_method"]')) {
            syncCheckoutPaymentAccordion();
        }
    });

    if (window.jQuery) {
        window.jQuery(document.body).on('updated_checkout payment_method_selected', () => {
            window.setTimeout(syncCheckoutPaymentAccordion, 30);
        });
    }

    document.addEventListener('click', (event) => {
        const paymentItem = event.target.closest('.woocommerce-checkout #payment .wc_payment_method');

        if (!paymentItem || event.target.matches('input, button, a, select, textarea') || event.target.closest('.payment_box')) {
            return;
        }

        const radio = paymentItem.querySelector('input[type="radio"]');

        if (radio && !radio.disabled) {
            radio.checked = true;
            radio.dispatchEvent(new Event('change', { bubbles: true }));
            syncCheckoutPaymentAccordion();
        }
    });

    document.addEventListener('input', (event) => {
        const cardNumber = event.target.closest('[data-card-number]');
        const cardExpiry = event.target.closest('[data-card-expiry]');
        const cardCvv = event.target.closest('[data-card-cvv]');

        if (cardNumber) {
            const digits = cardNumber.value.replace(/\D/g, '').slice(0, 16);
            cardNumber.value = digits.replace(/(.{4})/g, '$1 ').trim();
        }

        if (cardExpiry) {
            const digits = cardExpiry.value.replace(/\D/g, '').slice(0, 4);
            cardExpiry.value = digits.length > 2 ? `${digits.slice(0, 2)} / ${digits.slice(2)}` : digits;
        }

        if (cardCvv) {
            cardCvv.value = cardCvv.value.replace(/\D/g, '').slice(0, 4);
        }
    });

    document.addEventListener('click', (event) => {
        const couponToggle = event.target.closest('[data-checkout-coupon-toggle]');

        if (!couponToggle) {
            return;
        }

        const panel = document.querySelector('[data-checkout-coupon-panel]');
        const isOpen = couponToggle.getAttribute('aria-expanded') === 'true';

        couponToggle.setAttribute('aria-expanded', String(!isOpen));
        couponToggle.closest('.checkout-coupon-card')?.classList.toggle('is-open', !isOpen);

        if (panel) {
            panel.hidden = isOpen;

            if (!isOpen) {
                window.setTimeout(() => panel.querySelector('input')?.focus(), 80);
            }
        }
    });

    document.addEventListener('click', (event) => {
        const applyCoupon = event.target.closest('[data-checkout-apply-coupon]');

        if (!applyCoupon || !window.jQuery || !window.wc_checkout_params) {
            return;
        }

        const panel = applyCoupon.closest('[data-checkout-coupon-panel]');
        const input = panel?.querySelector('input[name="coupon_code"]');
        const feedback = panel?.querySelector('[data-checkout-coupon-feedback]');
        const couponCode = input?.value.trim();

        if (!couponCode) {
            if (feedback) {
                feedback.textContent = translateUi('couponEmpty', 'Veuillez saisir un code promotionnel.');
            }
            input?.focus();
            return;
        }

        applyCoupon.classList.add('is-loading');
        applyCoupon.disabled = true;

        window.jQuery.ajax({
            type: 'POST',
            url: window.wc_checkout_params.wc_ajax_url.toString().replace('%%endpoint%%', 'apply_coupon'),
            data: {
                security: window.wc_checkout_params.apply_coupon_nonce,
                coupon_code: couponCode,
            },
            success: (response) => {
                window.jQuery('.woocommerce-error, .woocommerce-message, .woocommerce-info').remove();
                window.jQuery('.woocommerce-notices-wrapper:first').html(response);
                window.jQuery(document.body).trigger('applied_coupon_in_checkout', [couponCode]);
                window.jQuery(document.body).trigger('update_checkout', { update_shipping_method: false });

                if (feedback) {
                    feedback.textContent = translateUi('couponApplied', 'Code appliqué, le récapitulatif se met à jour.');
                }
            },
            complete: () => {
                applyCoupon.classList.remove('is-loading');
                applyCoupon.disabled = false;
            },
        });
    });

    document.addEventListener('click', (event) => {
        const quantityButton = event.target.closest('[data-qty-minus], [data-qty-plus]');

        if (!quantityButton) {
            return;
        }

        const control = quantityButton.closest('[data-cart-quantity-control]');
        const input = control?.querySelector('input.qty');

        if (!input) {
            return;
        }

        const step = Number(input.step || 1) || 1;
        const min = input.min === '' ? 0 : Number(input.min);
        const max = input.max === '' ? Infinity : Number(input.max);
        const current = Number(input.value || 0);
        const direction = quantityButton.matches('[data-qty-plus]') ? 1 : -1;
        const nextValue = Math.min(max, Math.max(min, current + (step * direction)));

        input.value = String(nextValue);
        input.dispatchEvent(new Event('change', { bubbles: true }));

        const cartCard = quantityButton.closest('[data-cart-product-card]');
        cartCard?.classList.add('is-quantity-updated');
        window.setTimeout(() => cartCard?.classList.remove('is-quantity-updated'), 320);

        document.querySelectorAll('button[name="update_cart"]').forEach((button) => {
            button.disabled = false;
            button.removeAttribute('aria-disabled');
        });
    });

    const cookieBanner = document.querySelector('[data-cookie-banner]');
    const cookieModal = document.querySelector('[data-cookie-modal]');
    const cookiePanel = cookieModal?.querySelector('.cookie-modal-panel');
    const cookieToggles = Array.from(document.querySelectorAll('[data-cookie-category]'));
    const cookieSettings = window.cosmethiqueCookieSettings || {};
    const trackingSettings = window.cosmethiqueTrackingSettings || {};
    const cookieStorageKey = 'cosmethique_cookie_consent';
    const cookieVersion = cookieSettings.version || '2026-07-rgpd';
    let cookieLastFocus = null;

    const cookieDefaults = () => ({
        necessary: true,
        analytics: false,
        marketing: false,
        personalization: false,
        version: cookieVersion,
        savedAt: new Date().toISOString(),
    });

    const readCookieConsent = () => {
        const cookieValue = document.cookie
            .split('; ')
            .find((row) => row.startsWith(`${cookieStorageKey}=`))
            ?.split('=')
            .slice(1)
            .join('=');

        const storedValue = cookieValue || (() => {
            try {
                return window.localStorage.getItem(cookieStorageKey);
            } catch (error) {
                return '';
            }
        })();

        if (!storedValue) {
            return null;
        }

        try {
            const parsed = JSON.parse(decodeURIComponent(storedValue));
            return parsed && parsed.version === cookieVersion ? parsed : null;
        } catch (error) {
            return null;
        }
    };

    const writeCookieConsent = (preferences) => {
        const consent = {
            ...cookieDefaults(),
            ...preferences,
            necessary: true,
            version: cookieVersion,
            savedAt: new Date().toISOString(),
        };
        const encoded = encodeURIComponent(JSON.stringify(consent));

        document.cookie = `${cookieStorageKey}=${encoded}; path=/; max-age=15552000; SameSite=Lax`;

        try {
            window.localStorage.setItem(cookieStorageKey, encoded);
        } catch (error) {
            // Le cookie suffit si le stockage local est indisponible.
        }

        return consent;
    };

    const hasCookieConsent = (category, consent = readCookieConsent()) => {
        return category === 'necessary' || Boolean(consent && consent[category]);
    };

    const ensureDataLayer = () => {
        window.dataLayer = window.dataLayer || [];
        window.gtag = window.gtag || function gtag() {
            window.dataLayer.push(arguments);
        };

        return window.dataLayer;
    };

    const pushGtmEvent = (eventName, data = {}) => {
        ensureDataLayer().push({
            event: eventName,
            ...data,
        });
    };

    const loadGoogleTagManager = (consent = readCookieConsent()) => {
        if (!hasCookieConsent('analytics', consent) || !trackingSettings.gtmContainerId) {
            return;
        }

        ensureDataLayer();

        if (trackingSettings.ga4MeasurementId) {
            window.dataLayer.push({
                event: 'cosmethique_consent_granted',
                cosmethique_ga4_measurement_id: trackingSettings.ga4MeasurementId,
            });
        }

        const existingGtmScript = document.querySelector(`script[src*="googletagmanager.com/gtm.js?id=${trackingSettings.gtmContainerId}"]`);
        if (existingGtmScript || window.google_tag_manager?.[trackingSettings.gtmContainerId] || window.__cosmethiqueGtmInjected) {
            return;
        }

        window.__cosmethiqueGtmInjected = true;
        window.dataLayer.push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js',
        });

        const firstScript = document.getElementsByTagName('script')[0];
        const gtmScript = document.createElement('script');
        gtmScript.async = true;
        gtmScript.src = `https://www.googletagmanager.com/gtm.js?id=${encodeURIComponent(trackingSettings.gtmContainerId)}`;
        firstScript.parentNode.insertBefore(gtmScript, firstScript);
    };

    const syncGoogleConsentMode = (consent = readCookieConsent()) => {
        const preferences = consent || cookieDefaults();

        ensureDataLayer();

        window.gtag('consent', 'update', {
            ad_storage: preferences.marketing ? 'granted' : 'denied',
            ad_user_data: preferences.marketing ? 'granted' : 'denied',
            ad_personalization: preferences.marketing ? 'granted' : 'denied',
            analytics_storage: preferences.analytics ? 'granted' : 'denied',
            functionality_storage: 'granted',
            security_storage: 'granted',
        });

        window.dataLayer.push({
            event: 'cosmethique_cookie_consent_update',
            consent_analytics: Boolean(preferences.analytics),
            consent_marketing: Boolean(preferences.marketing),
            consent_personalization: Boolean(preferences.personalization),
        });
    };

    const syncCookieToggles = (consent = readCookieConsent()) => {
        const preferences = consent || cookieDefaults();

        cookieToggles.forEach((toggle) => {
            toggle.checked = Boolean(preferences[toggle.dataset.cookieCategory]);
        });
    };

    const activateDeferredCookieScripts = (consent = readCookieConsent()) => {
        document.querySelectorAll('script[type="text/plain"][data-cookie-category]').forEach((script) => {
            const category = script.dataset.cookieCategory;

            if (!hasCookieConsent(category, consent) || script.dataset.cookieActivated === 'true') {
                return;
            }

            const activeScript = document.createElement('script');
            Array.from(script.attributes).forEach((attribute) => {
                if (!['type', 'data-cookie-category', 'data-cookie-activated'].includes(attribute.name)) {
                    activeScript.setAttribute(attribute.name, attribute.value);
                }
            });

            if (script.src) {
                activeScript.src = script.src;
            }

            activeScript.textContent = script.textContent;
            script.dataset.cookieActivated = 'true';
            script.replaceWith(activeScript);
        });

        loadGoogleTagManager(consent);
        document.dispatchEvent(new CustomEvent('cosmethique:cookies-ready', { detail: consent || readCookieConsent() || cookieDefaults() }));
    };

    const showCookieBanner = () => {
        if (!cookieBanner) {
            return;
        }

        cookieBanner.hidden = false;
        window.requestAnimationFrame(() => cookieBanner.classList.add('is-visible'));
    };

    const hideCookieBanner = () => {
        if (!cookieBanner) {
            return;
        }

        cookieBanner.classList.remove('is-visible');
        window.setTimeout(() => {
            cookieBanner.hidden = true;
        }, 260);
    };

    const closeCookieModal = () => {
        if (!cookieModal) {
            return;
        }

        cookieModal.classList.remove('is-visible');
        document.body.classList.remove('cookie-modal-open');

        window.setTimeout(() => {
            cookieModal.hidden = true;
        }, 260);

        if (cookieLastFocus) {
            cookieLastFocus.focus({ preventScroll: true });
        }
    };

    const openCookieModal = () => {
        if (!cookieModal || !cookiePanel) {
            return;
        }

        cookieLastFocus = document.activeElement;
        syncCookieToggles();
        cookieModal.hidden = false;
        document.body.classList.add('cookie-modal-open');
        window.requestAnimationFrame(() => {
            cookieModal.classList.add('is-visible');
            cookiePanel.focus({ preventScroll: true });
        });
    };

    const saveCookieChoices = (preferences) => {
        const consent = writeCookieConsent(preferences);
        syncCookieToggles(consent);
        hideCookieBanner();
        closeCookieModal();
        syncGoogleConsentMode(consent);
        activateDeferredCookieScripts(consent);

        if (consent.analytics) {
            pushGtmEvent('page_view', {
                page_title: document.title,
                page_location: window.location.href,
                page_path: window.location.pathname,
            });
        }
    };

    document.querySelectorAll('[data-cookie-accept-all]').forEach((button) => {
        button.addEventListener('click', () => {
            saveCookieChoices({
                analytics: true,
                marketing: true,
                personalization: true,
            });
        });
    });

    document.querySelectorAll('[data-cookie-refuse]').forEach((button) => {
        button.addEventListener('click', () => {
            saveCookieChoices({
                analytics: false,
                marketing: false,
                personalization: false,
            });
        });
    });

    document.querySelectorAll('[data-cookie-customize], [data-cookie-manage]').forEach((button) => {
        button.addEventListener('click', openCookieModal);
    });

    document.querySelectorAll('[data-cookie-save]').forEach((button) => {
        button.addEventListener('click', () => {
            const preferences = cookieDefaults();
            cookieToggles.forEach((toggle) => {
                preferences[toggle.dataset.cookieCategory] = toggle.checked;
            });
            saveCookieChoices(preferences);
        });
    });

    cookieModal?.querySelectorAll('[data-cookie-modal-close]').forEach((button) => {
        button.addEventListener('click', closeCookieModal);
    });

    document.addEventListener('keydown', (event) => {
        if (!cookieModal || cookieModal.hidden) {
            return;
        }

        if (event.key === 'Escape') {
            closeCookieModal();
        }

        if (event.key === 'Tab' && cookiePanel) {
            const focusable = Array.from(cookiePanel.querySelectorAll('a, button, input, [tabindex]:not([tabindex="-1"])'))
                .filter((item) => !item.disabled && item.offsetParent !== null);
            const first = focusable[0];
            const last = focusable[focusable.length - 1];

            if (!first || !last) {
                return;
            }

            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault();
                last.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault();
                first.focus();
            }
        }
    });

    if (readCookieConsent()) {
        const storedConsent = readCookieConsent();
        syncCookieToggles(storedConsent);
        syncGoogleConsentMode(storedConsent);
        activateDeferredCookieScripts(storedConsent);
    } else {
        showCookieBanner();
    }

    pushGtmEvent('cosmethique_page_context', {
        page_title: document.title,
        page_location: window.location.href,
        page_path: window.location.pathname,
    });

    const searchParams = new URLSearchParams(window.location.search);
    const searchTerm = searchParams.get('s');
    if (searchTerm) {
        pushGtmEvent('view_search_results', {
            search_term: searchTerm,
        });
    }

    let scrollEventSent = false;
    const trackScrollDepth = () => {
        if (scrollEventSent) {
            return;
        }

        const scrollable = document.documentElement.scrollHeight - window.innerHeight;
        const depth = scrollable > 0 ? ((window.scrollY || document.documentElement.scrollTop) / scrollable) : 1;

        if (depth >= 0.9) {
            scrollEventSent = true;
            pushGtmEvent('scroll', {
                percent_scrolled: 90,
            });
            window.removeEventListener('scroll', trackScrollDepth);
        }
    };
    window.addEventListener('scroll', trackScrollDepth, { passive: true });
    trackScrollDepth();

    document.addEventListener('click', (event) => {
        const target = event.target.closest('a, button');

        if (!target) {
            return;
        }

        const linkUrl = target.href || '';
        const label = (target.getAttribute('aria-label') || target.textContent || '').replace(/\s+/g, ' ').trim().slice(0, 120);
        const filePattern = /\.(pdf|docx?|xlsx?|pptx?|zip|csv|png|jpe?g|webp)(\?|#|$)/i;

        if (linkUrl && filePattern.test(linkUrl)) {
            pushGtmEvent('file_download', {
                link_url: linkUrl,
                link_text: label,
            });
            return;
        }

        pushGtmEvent('click', {
            link_url: linkUrl,
            link_text: label,
            element_type: target.tagName.toLowerCase(),
        });
    }, { passive: true });

    const animatedCounters = document.querySelectorAll('[data-counter-target]');
    if (animatedCounters.length) {
        const animateCounter = (counter) => {
            const target = Number(counter.dataset.counterTarget || 0);
            const duration = 1200;
            const start = performance.now();

            const tick = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                counter.textContent = Math.round(target * eased).toLocaleString('fr-FR');

                if (progress < 1) {
                    window.requestAnimationFrame(tick);
                }
            };

            window.requestAnimationFrame(tick);
        };

        if ('IntersectionObserver' in window) {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.querySelectorAll('[data-counter-target]').forEach(animateCounter);
                    counterObserver.unobserve(entry.target);
                });
            }, { threshold: 0.35 });

            document.querySelectorAll('.franchise-network-stats, [data-counter-scope]').forEach((statsWrap) => counterObserver.observe(statsWrap));
        } else {
            animatedCounters.forEach(animateCounter);
        }
    }

    document.querySelectorAll('[data-about-testimonials]').forEach((slider) => {
        const slides = Array.from(slider.querySelectorAll('[data-about-testimonial]'));
        const dots = Array.from(slider.querySelectorAll('[data-about-testimonial-dot]'));
        let activeIndex = slides.findIndex((slide) => slide.classList.contains('is-active'));
        let autoplay = null;

        if (!slides.length) {
            return;
        }

        if (activeIndex < 0) {
            activeIndex = 0;
        }

        const setSlide = (index) => {
            activeIndex = (index + slides.length) % slides.length;

            slides.forEach((slide, slideIndex) => {
                slide.classList.toggle('is-active', slideIndex === activeIndex);
            });

            dots.forEach((dot, dotIndex) => {
                dot.setAttribute('aria-current', String(dotIndex === activeIndex));
            });
        };

        const startAutoplay = () => {
            window.clearInterval(autoplay);
            autoplay = window.setInterval(() => setSlide(activeIndex + 1), 5200);
        };

        dots.forEach((dot, dotIndex) => {
            dot.addEventListener('click', () => {
                setSlide(dotIndex);
                startAutoplay();
            });
        });

        startAutoplay();
    });

    const universeParallaxImages = Array.from(document.querySelectorAll('[data-universe-parallax]'));
    if (universeParallaxImages.length && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const updateUniverseParallax = () => {
            const viewportCenter = window.innerHeight / 2;

            universeParallaxImages.forEach((image) => {
                const rect = image.getBoundingClientRect();
                const elementCenter = rect.top + rect.height / 2;
                const progress = Math.max(-1, Math.min(1, (elementCenter - viewportCenter) / window.innerHeight));
                image.style.setProperty('--universe-parallax', `${(progress * -12).toFixed(2)}px`);
            });
        };

        updateUniverseParallax();
        window.addEventListener('scroll', updateUniverseParallax, { passive: true });
        window.addEventListener('resize', updateUniverseParallax);
    }

    document.querySelectorAll('[data-diagnostic]').forEach((diagnostic) => {
        const diagnosticTexts = i18n.diagnostic || {};
        const productDataElement = diagnostic.querySelector('[data-diagnostic-products]');
        const widget = diagnostic.querySelector('.diagnostic-widget');
        const form = diagnostic.querySelector('.diagnostic-form');
        const steps = Array.from(diagnostic.querySelectorAll('[data-diagnostic-step]'));
        const progress = diagnostic.querySelector('[data-diagnostic-progress]');
        const stepLabel = diagnostic.querySelector('[data-diagnostic-step-label]');
        const previousButton = diagnostic.querySelector('[data-diagnostic-prev]');
        const nextButton = diagnostic.querySelector('[data-diagnostic-next]');
        const result = diagnostic.querySelector('[data-diagnostic-result]');
        const routineTarget = diagnostic.querySelector('[data-diagnostic-routine]');
        const explanationTarget = diagnostic.querySelector('[data-diagnostic-explanation]');
        const restartButton = diagnostic.querySelector('[data-diagnostic-restart]');
        const cartButton = diagnostic.querySelector('[data-diagnostic-cart]');
        let products = {};
        let currentStep = 0;

        if (!widget || !form || !steps.length) {
            return;
        }

        try {
            products = JSON.parse(productDataElement?.textContent || '{}');
        } catch (error) {
            products = {};
        }

        widget.classList.add('is-ready');

        const diagnosticDemoAnswers = {
            skin: 'mixed',
            goal: 'imperfections',
            moment: 'both',
            texture: 'cream',
            budget: 'medium',
            complete: 'yes',
        };

        Object.entries(diagnosticDemoAnswers).forEach(([name, value]) => {
            const alreadyChecked = form.querySelector(`input[name="${name}"]:checked`);
            const demoInput = form.querySelector(`input[name="${name}"][value="${value}"]`);

            if (!alreadyChecked && demoInput) {
                demoInput.checked = true;
                demoInput.closest('label')?.classList.add('is-selected');
            }
        });

        const uniqueKeys = (keys) => keys.filter((key, index) => key && keys.indexOf(key) === index && products[key]);

        const selectedValue = (name) => {
            const checked = form.querySelector(`input[name="${name}"]:checked`);
            return checked ? checked.value : '';
        };

        const getAnswers = () => ({
            skin: selectedValue('skin'),
            goal: selectedValue('goal'),
            moment: selectedValue('moment'),
            texture: selectedValue('texture'),
            budget: selectedValue('budget'),
            complete: selectedValue('complete'),
        });

        const currentStepAnswered = () => {
            const current = steps[currentStep];
            const checked = current?.querySelector('input[type="radio"]:checked');
            return Boolean(checked);
        };

        const updateStep = () => {
            steps.forEach((step, index) => {
                step.classList.toggle('is-active', index === currentStep);
            });

            const stepNumber = currentStep + 1;
            if (stepLabel) {
                stepLabel.textContent = formatTranslated(
                    translateDiagnostic('step', 'Étape %1$d / %2$d'),
                    [stepNumber, steps.length]
                );
            }

            if (progress) {
                progress.style.width = `${(stepNumber / steps.length) * 100}%`;
            }

            if (previousButton) {
                previousButton.disabled = currentStep === 0;
            }

            if (nextButton) {
                nextButton.disabled = !currentStepAnswered();
                nextButton.textContent = currentStep === steps.length - 1
                    ? translateDiagnostic('viewRoutine', 'Voir ma routine')
                    : translateDiagnostic('continue', 'Continuer');
            }
        };

        const buildRoutine = () => {
            const answers = getAnswers();
            let keys = ['gel', 'serum', 'creme'];

            if (answers.skin === 'dry' || answers.goal === 'hydrate') {
                keys = ['serum', 'creme', 'huile'];
            }

            if (answers.skin === 'sensitive' || answers.goal === 'soothe') {
                keys = ['lotion', 'creme', 'serum'];
            }

            if (answers.skin === 'oily' || answers.goal === 'imperfections') {
                keys = ['gel', 'lotion', 'masque'];
            }

            if (answers.goal === 'glow') {
                keys = ['gel', 'serum', 'creme'];
            }

            if (answers.goal === 'age') {
                keys = ['serum', 'creme', 'huile'];
            }

            if (answers.texture === 'oil') {
                keys.unshift('huile');
            }

            if (answers.texture === 'cream') {
                keys.unshift('creme');
            }

            if (answers.texture === 'light') {
                keys.unshift('lotion', 'serum');
            }

            if (answers.complete === 'yes') {
                keys.push('masque');
            }

            keys = uniqueKeys(keys);

            if (answers.moment === 'morning') {
                keys = keys.filter((key) => products[key]?.moment !== 'evening');
                keys = uniqueKeys([...keys, 'serum', 'creme']);
            }

            if (answers.moment === 'evening') {
                keys = uniqueKeys(['gel', ...keys.filter((key) => products[key]?.moment === 'evening'), 'creme']);
            }

            const limit = answers.budget === 'low' ? 2 : answers.budget === 'medium' ? 3 : 4;
            return keys.slice(0, answers.complete === 'yes' ? Math.max(3, limit) : limit);
        };

        const renderResult = () => {
            const answers = getAnswers();
            const routineKeys = buildRoutine();
            const routineProducts = routineKeys.map((key) => products[key]).filter(Boolean);
            const morning = routineProducts.filter((product) => product.moment !== 'evening');
            const evening = routineProducts.filter((product) => product.moment === 'evening');
            const groups = [
                { label: translateDiagnostic('morning', 'Matin'), items: morning },
                { label: translateDiagnostic('evening', 'Soir'), items: evening },
            ].filter((group) => group.items.length);

            if (routineTarget) {
                routineTarget.innerHTML = groups.map((group) => `
                    <article class="diagnostic-routine-group">
                        <h4>${group.label}</h4>
                        <div class="diagnostic-products">
                            ${group.items.map((product) => `
                                <article class="diagnostic-product-card">
                                    <img src="${product.image}" alt="${product.alt || product.title}">
                                    <span>${product.title}</span>
                                    <strong>${product.price}</strong>
                                    <em>${product.reason}</em>
                                    <div class="diagnostic-product-actions">
                                        <a class="button shop-button-secondary" href="${product.url}">${translateDiagnostic('viewProduct', 'Voir le produit')}</a>
                                        <a class="button button-primary" href="${product.cartUrl || product.url}">${translateDiagnostic('addToCart', 'Ajouter au panier')}</a>
                                    </div>
                                </article>
                            `).join('')}
                        </div>
                    </article>
                `).join('');
            }

            const skinLabels = {
                dry: diagnosticTexts.skin?.dry || 'sèche',
                mixed: diagnosticTexts.skin?.mixed || 'mixte',
                oily: diagnosticTexts.skin?.oily || 'grasse',
                sensitive: diagnosticTexts.skin?.sensitive || 'sensible',
            };
            const goalLabels = {
                hydrate: diagnosticTexts.goal?.hydrate || 'd’hydratation',
                glow: diagnosticTexts.goal?.glow || 'd’éclat',
                imperfections: diagnosticTexts.goal?.imperfections || 'anti-imperfections',
                age: diagnosticTexts.goal?.age || 'anti-âge',
                soothe: diagnosticTexts.goal?.soothe || 'd’apaisement',
            };

            if (explanationTarget) {
                explanationTarget.textContent = formatTranslated(
                    translateDiagnostic('explanation', 'Cette routine répond à une peau %1$s avec un objectif %2$s. Les textures sélectionnées respectent votre préférence et composent un rituel %3$s, facile à adopter au quotidien.'),
                    [
                        skinLabels[answers.skin] || diagnosticTexts.skin?.balanced || 'équilibrée',
                        goalLabels[answers.goal] || diagnosticTexts.goal?.naturalBeauty || 'beauté naturelle',
                        answers.complete === 'yes'
                            ? translateDiagnostic('complete', 'complet')
                            : translateDiagnostic('essential', 'essentiel'),
                    ]
                );
            }

            if (cartButton) {
                const productIds = routineProducts.map((product) => Number(product.id || 0)).filter(Boolean);
                if (productIds.length) {
                    const url = new URL(window.location.href);
                    url.searchParams.set('cosmethique_add_routine', productIds.join(','));
                    cartButton.href = url.toString();
                    cartButton.removeAttribute('aria-disabled');
                } else {
                    cartButton.href = cartButton.href || '#';
                    cartButton.setAttribute('aria-disabled', 'true');
                }
            }

            form.hidden = true;
            result.hidden = false;
            if (stepLabel) {
                stepLabel.textContent = translateDiagnostic('result', 'Résultat');
            }
            if (progress) {
                progress.style.width = '100%';
            }
            result.scrollIntoView({ behavior: 'smooth', block: 'start' });
        };

        form.addEventListener('change', (event) => {
            const label = event.target.closest('label');
            if (label) {
                label.parentElement.querySelectorAll('label').forEach((item) => item.classList.toggle('is-selected', item === label));
            }

            updateStep();

            window.setTimeout(() => {
                if (currentStep < steps.length - 1 && currentStepAnswered()) {
                    currentStep += 1;
                    updateStep();
                } else if (currentStep === steps.length - 1 && currentStepAnswered()) {
                    renderResult();
                }
            }, 360);
        });

        previousButton?.addEventListener('click', () => {
            currentStep = Math.max(0, currentStep - 1);
            updateStep();
        });

        nextButton?.addEventListener('click', () => {
            if (!currentStepAnswered()) {
                return;
            }

            if (currentStep === steps.length - 1) {
                renderResult();
                return;
            }

            currentStep += 1;
            updateStep();
        });

        restartButton?.addEventListener('click', () => {
            form.reset();
            form.querySelectorAll('.is-selected').forEach((item) => item.classList.remove('is-selected'));
            currentStep = 0;
            result.hidden = true;
            form.hidden = false;
            updateStep();
            widget.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });

        updateStep();
    });

    const franchiseMapElement = document.querySelector('[data-franchise-map]');
    if (franchiseMapElement && window.L) {
        const mapTranslations = i18n.map || {};
        const translatedHours = (mapTranslations.mondaySaturdayHours && mapTranslations.mondaySaturdayHours[i18n.lang]) || 'Lun-Sam 10h-19h';
        const viewStoreText = mapTranslations.viewStore || 'Voir la boutique';
        const franchiseLocations = [
            { city: 'Paris', coords: [48.8566, 2.3522], address: '18 rue Saint-Honoré, 75001 Paris', phone: '01 42 18 40 12', hours: translatedHours },
            { city: 'Lyon', coords: [45.764, 4.8357], address: '6 rue Édouard Herriot, 69002 Lyon', phone: '04 78 20 14 88', hours: translatedHours },
            { city: 'Marseille', coords: [43.2965, 5.3698], address: '22 rue Paradis, 13001 Marseille', phone: '04 91 35 72 10', hours: translatedHours },
            { city: 'Bordeaux', coords: [44.8378, -0.5792], address: '9 cours de l’Intendance, 33000 Bordeaux', phone: '05 56 44 18 20', hours: translatedHours },
            { city: 'Toulouse', coords: [43.6047, 1.4442], address: '14 rue d’Alsace-Lorraine, 31000 Toulouse', phone: '05 61 22 40 18', hours: translatedHours },
            { city: 'Lille', coords: [50.6292, 3.0573], address: '5 rue Esquermoise, 59000 Lille', phone: '03 20 12 45 90', hours: translatedHours },
            { city: 'Nantes', coords: [47.2184, -1.5536], address: '11 rue Crébillon, 44000 Nantes', phone: '02 40 18 72 30', hours: translatedHours },
            { city: 'Strasbourg', coords: [48.5734, 7.7521], address: '7 rue des Hallebardes, 67000 Strasbourg', phone: '03 88 24 16 42', hours: translatedHours },
            { city: 'Nice', coords: [43.7102, 7.262], address: '19 avenue Jean Médecin, 06000 Nice', phone: '04 93 62 14 75', hours: translatedHours },
            { city: 'Montpellier', coords: [43.6108, 3.8767], address: '8 rue de la Loge, 34000 Montpellier', phone: '04 67 31 24 18', hours: translatedHours },
            { city: 'Rennes', coords: [48.1173, -1.6778], address: '10 rue Le Bastard, 35000 Rennes', phone: '02 99 18 44 22', hours: translatedHours },
            { city: 'Aix-en-Provence', coords: [43.5297, 5.4474], address: '16 cours Mirabeau, 13100 Aix-en-Provence', phone: '04 42 25 18 64', hours: translatedHours },
        ];

        const map = window.L.map(franchiseMapElement, {
            scrollWheelZoom: false,
            zoomControl: true,
        }).setView([46.8, 2.5], 5.7);

        window.L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; OpenStreetMap',
        }).addTo(map);

        const markerIcon = window.L.divIcon({
            className: 'cosmethique-map-marker-wrap',
            html: '<span class="cosmethique-map-marker"><strong>CÉ</strong></span>',
            iconSize: [46, 46],
            iconAnchor: [23, 23],
            popupAnchor: [0, -20],
        });

        franchiseLocations.forEach((location) => {
            const popup = `
                <article class="cosmethique-map-popup">
                    <strong class="cosmethique-map-popup-logo">COSM’ÉTHIQUE</strong>
                    <h3>${location.city}</h3>
                    <p>${location.address}</p>
                    <p>${location.phone}</p>
                    <p>${location.hours}</p>
                    <a class="button button-primary popup-btn" href="#franchise-request-form">${viewStoreText}</a>
                </article>
            `;

            window.L.marker(location.coords, { icon: markerIcon, title: `COSM’ÉTHIQUE ${location.city}` })
                .addTo(map)
                .bindPopup(popup, { closeButton: true, minWidth: 240, className: 'cosmethique-leaflet-popup' });
        });

        window.setTimeout(() => map.invalidateSize(), 300);
    }

    document.querySelectorAll('[data-filter-group]').forEach((group) => {
        const groupName = group.dataset.filterGroup;
        const buttons = group.querySelectorAll('[data-filter-button]');
        const cards = document.querySelectorAll(`[data-filter-card="${groupName}"]`);

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filterButton || 'all';

                buttons.forEach((item) => item.classList.toggle('is-active', item === button));
                cards.forEach((card) => {
                    const values = (card.dataset.filterValues || '').split(/\s+/);
                    const isVisible = filter === 'all' || values.includes(filter);
                    card.hidden = !isVisible;
                });
            });
        });
    });

    const ingredientPanel = document.querySelector('[data-ingredient-panel]');
    const ingredientDetailCards = ingredientPanel ? ingredientPanel.querySelectorAll('[data-ingredient-detail]') : [];
    const ingredientCloseButtons = ingredientPanel ? ingredientPanel.querySelectorAll('[data-ingredient-close]') : [];

    const closeIngredientPanel = () => {
        if (!ingredientPanel) {
            return;
        }

        ingredientPanel.hidden = true;
        document.documentElement.classList.remove('ingredient-panel-open');
        ingredientDetailCards.forEach((card) => {
            card.hidden = true;
        });
    };

    if (ingredientPanel && ingredientDetailCards.length) {
        document.querySelectorAll('[data-ingredient-open]').forEach((button) => {
            button.addEventListener('click', () => {
                const target = button.dataset.ingredientOpen || '';

                ingredientDetailCards.forEach((card) => {
                    card.hidden = card.dataset.ingredientDetail !== target;
                });

                ingredientPanel.hidden = false;
                document.documentElement.classList.add('ingredient-panel-open');

                const closeButton = ingredientPanel.querySelector('.ingredient-panel-close');
                closeButton?.focus({ preventScroll: true });
            });
        });

        ingredientCloseButtons.forEach((button) => {
            button.addEventListener('click', closeIngredientPanel);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !ingredientPanel.hidden) {
                closeIngredientPanel();
            }
        });
    }

    const faqSearch = document.querySelector('[data-faq-search]');
    const faqCategories = document.querySelectorAll('[data-faq-category]');
    const faqSuggestions = document.querySelectorAll('[data-faq-suggestion]');
    const faqCategoryJumps = document.querySelectorAll('[data-faq-category-jump]');

    if (faqSearch && faqCategories.length) {
        const filterFaq = () => {
            const query = normalizeSearch(faqSearch.value);

            faqCategories.forEach((category) => {
                let visibleItems = 0;

                category.querySelectorAll('[data-faq-item]').forEach((item) => {
                    const text = normalizeSearch(item.textContent || '');
                    const isVisible = !query || text.includes(query);
                    item.hidden = !isVisible;

                    if (isVisible) {
                        visibleItems += 1;
                    } else {
                        item.open = false;
                    }
                });

                category.classList.toggle('is-empty', visibleItems === 0);
            });
        };

        faqSearch.addEventListener('input', filterFaq);

        faqSuggestions.forEach((button) => {
            button.addEventListener('click', () => {
                faqSearch.value = button.dataset.faqSuggestion || button.textContent || '';
                filterFaq();
                faqSearch.focus({ preventScroll: true });
            });
        });

        faqCategoryJumps.forEach((button) => {
            button.addEventListener('click', () => {
                const key = button.dataset.faqCategoryJump || '';
                const target = document.querySelector(`[data-faq-category-key="${key}"]`);

                if (!target) {
                    return;
                }

                target.classList.remove('is-empty');
                target.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth', block: 'start' });

                const firstQuestion = target.querySelector('[data-faq-item]');
                if (firstQuestion && !firstQuestion.open) {
                    window.setTimeout(() => {
                        firstQuestion.open = true;
                    }, prefersReducedMotion ? 0 : 320);
                }
            });
        });
    }

    const commitmentsParallaxItems = Array.from(document.querySelectorAll('.commitments-action-media img, .commitments-quote-banner img, .faq-immersive-hero > img, .faq-help-media img'));
    if (commitmentsParallaxItems.length && !prefersReducedMotion) {
        let commitmentsParallaxFrame = null;

        const updateCommitmentsParallax = () => {
            commitmentsParallaxFrame = null;
            const viewportHeight = window.innerHeight || 1;

            commitmentsParallaxItems.forEach((item) => {
                const rect = item.getBoundingClientRect();
                if (rect.bottom < 0 || rect.top > viewportHeight) {
                    return;
                }

                const progress = ((rect.top + rect.height / 2) - viewportHeight / 2) / viewportHeight;
                const offset = Math.max(-20, Math.min(20, progress * -38));
                item.style.setProperty('--commitments-parallax', `${offset.toFixed(2)}px`);
            });
        };

        const requestCommitmentsParallax = () => {
            if (!commitmentsParallaxFrame) {
                commitmentsParallaxFrame = window.requestAnimationFrame(updateCommitmentsParallax);
            }
        };

        updateCommitmentsParallax();
        window.addEventListener('scroll', requestCommitmentsParallax, { passive: true });
        window.addEventListener('resize', requestCommitmentsParallax);
    }

    const storeSearch = document.querySelector('[data-store-search]');
    const storeCards = document.querySelectorAll('[data-store-card]');
    const storePins = document.querySelectorAll('[data-store-pin]');

    const setActiveStore = (city = '') => {
        storeCards.forEach((card) => {
            const isMatch = !city || card.dataset.storeCity === city;
            card.classList.toggle('is-highlighted', isMatch && Boolean(city));
        });
        storePins.forEach((pin) => {
            pin.classList.toggle('is-active', pin.dataset.storePin === city);
        });
    };

    if (storeSearch && storeCards.length) {
        storeSearch.addEventListener('input', () => {
            const query = normalizeSearch(storeSearch.value);

            storeCards.forEach((card) => {
                const city = normalizeSearch(card.dataset.storeCity || '');
                card.hidden = query && !city.includes(query);
            });
            setActiveStore('');
        });
    }

    storePins.forEach((pin) => {
        pin.addEventListener('click', () => {
            const city = pin.dataset.storePin || '';
            const targetCard = document.querySelector(`[data-store-card][data-store-city="${city}"]`);

            setActiveStore(city);

            if (targetCard) {
                targetCard.hidden = false;
                targetCard.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth', block: 'center' });
            }
        });
    });

    const footerNavGroups = Array.from(document.querySelectorAll('.site-footer .footer-nav-group'));
    if (footerNavGroups.length) {
        const mobileFooterQuery = window.matchMedia('(max-width: 820px)');
        const syncFooterAccordions = () => {
            footerNavGroups.forEach((group, index) => {
                group.open = !mobileFooterQuery.matches || index === 0;
            });
        };

        syncFooterAccordions();
        mobileFooterQuery.addEventListener?.('change', syncFooterAccordions);

        footerNavGroups.forEach((group) => {
            group.addEventListener('toggle', () => {
                if (!mobileFooterQuery.matches || !group.open) {
                    return;
                }

                footerNavGroups.forEach((otherGroup) => {
                    if (otherGroup !== group) {
                        otherGroup.open = false;
                    }
                });
            });
        });
    }

    if (!prefersReducedMotion) {
        document.querySelectorAll(`
            .front-page > section:not(.hero-section),
            .front-page .section-heading,
            .front-page .home-univers-heading,
            .front-page .home-diagnostic-copy,
            .front-page .home-diagnostic-media,
            .front-page .home-expertise-heading,
            .front-page .newsletter-panel,
            .shop-redesign > section,
            .blog-page-main section,
            .diagnostic-page section,
            .institutional-page section,
            .institutional-value-card,
            .ingredient-library-card,
            .ingredient-feature-card,
            .commitment-timeline-card,
            .institutional-stat-card,
            .quality-step,
            .quality-gallery-card,
            .quality-choice-card,
            .faq-category-card,
            .faq-popular-card,
            .faq-search-panel,
            .faq-contact-panel,
            .faq-search-copy,
            .faq-search-giant,
            .faq-suggestion-list,
            .faq-section-heading,
            .faq-category-tile,
            .faq-question-aside,
            .faq-accordion-group,
            .faq-popular-large-card,
            .faq-help-media,
            .faq-help-copy,
            .commitments-hero,
            .commitments-value-card,
            .commitments-stat-card,
            .commitments-action-timeline article,
            .commitments-priority-card,
            .commitments-quote-banner,
            .boutique-card,
            .review-page-card
        `).forEach((item) => item.classList.add('motion-reveal'));

        document.querySelectorAll('.front-page .home-expertise-copy, .front-page .home-diagnostic-copy').forEach((item) => item.classList.add('motion-reveal--left'));
        document.querySelectorAll('.front-page .home-expertise-media, .front-page .home-diagnostic-media').forEach((item) => item.classList.add('motion-reveal--right'));
        document.querySelectorAll('.front-page .product-card, .front-page .home-universe-card, .front-page .blog-showcase-card, .front-page .testimonial-grid figure').forEach((item) => item.classList.add('motion-reveal--scale'));
    }

    const revealItems = document.querySelectorAll('.motion-reveal, .category-card, .product-card, .promo-card, .story-grid, .testimonial-grid figure, .blog-card, .blog-showcase-card, .blog-featured-card, .blog-sidebar-card, .shop-premium-block, .shop-promo-section, .shop-packs-section, .shop-product-card, .shop-pack-card, .about-reveal, .home-universe-card, .home-diagnostic-panel, .home-expertise-heading, .home-expertise-copy, .home-expertise-media, .home-expertise-cards article, .account-login-card, .account-benefit-card, .account-stats-band, .institutional-page section, .institutional-value-card, .ingredient-library-card, .ingredient-feature-card, .commitment-timeline-card, .institutional-stat-card, .quality-step, .quality-gallery-card, .quality-choice-card, .faq-category-card, .faq-popular-card, .faq-search-panel, .faq-contact-panel, .faq-search-copy, .faq-search-giant, .faq-suggestion-list, .faq-section-heading, .faq-category-tile, .faq-question-aside, .faq-accordion-group, .faq-popular-large-card, .faq-help-media, .faq-help-copy, .commitments-hero, .commitments-value-card, .commitments-stat-card, .commitments-action-timeline article, .commitments-priority-card, .commitments-quote-banner, .boutique-card, .review-page-card, .site-footer[data-animate]');

    const revealGroups = document.querySelectorAll('.front-page .products-grid, .front-page .home-univers-grid, .front-page .testimonial-grid, .front-page .blog-showcase-grid, .front-page .home-expertise-cards, .shop-products-slider, .shop-pack-grid, .visage-product-grid, .blog-showcase-grid, .institutional-card-grid, .ingredient-library-grid, .ingredient-feature-grid, .commitment-timeline, .institutional-stats-grid, .quality-timeline, .quality-gallery-grid, .quality-choice-grid, .faq-popular-grid, .faq-category-grid, .faq-category-strip, .faq-popular-large-grid, .faq-accordion-column, .commitments-values-grid, .commitments-stats-grid, .commitments-action-timeline, .commitments-priorities-grid, .boutique-card-grid, .review-card-grid');
    revealGroups.forEach((group) => {
        Array.from(group.children).forEach((item, index) => {
            item.style.setProperty('--reveal-delay', `${Math.min(index * 70, 420)}ms`);
        });
    });

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        revealItems.forEach((item) => observer.observe(item));
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    const accountAccess = document.querySelector('.account-woocommerce-wrap');
    if (accountAccess) {
        const loginForm = accountAccess.querySelector('.woocommerce-form-login');
        const registerForm = accountAccess.querySelector('.woocommerce-form-register');
        const loginColumn = loginForm ? (loginForm.closest('.u-column1, .col-1') || loginForm) : null;
        const registerColumn = registerForm ? (registerForm.closest('.u-column2, .col-2') || registerForm) : null;
        const tabs = Array.from(document.querySelectorAll('[data-account-tab]'));

        if (loginForm && !loginForm.id) {
            loginForm.id = 'customer_login_form';
        }

        if (loginColumn) {
            loginColumn.id = 'customer_login_panel';
            loginColumn.setAttribute('role', 'tabpanel');
            loginColumn.setAttribute('aria-labelledby', 'account-tab-login');
        }

        if (registerColumn) {
            registerColumn.id = 'customer_register_panel';
            registerColumn.setAttribute('role', 'tabpanel');
            registerColumn.setAttribute('aria-labelledby', 'account-tab-register');
        }

        const activateAccountTab = (targetTab = 'login', focusPanel = false) => {
            const activeTab = targetTab === 'register' ? 'register' : 'login';
            accountAccess.classList.add('is-tabbed');
            accountAccess.dataset.activeTab = activeTab;

            tabs.forEach((tab) => {
                const isActive = tab.getAttribute('data-account-tab') === activeTab;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
                tab.setAttribute('tabindex', isActive ? '0' : '-1');
            });

            if (loginColumn) {
                loginColumn.hidden = activeTab !== 'login';
            }

            if (registerColumn) {
                registerColumn.hidden = activeTab !== 'register';
            }

            const activeForm = activeTab === 'register' ? registerForm : loginForm;

            if (focusPanel && activeForm) {
                const firstInput = activeForm.querySelector('input:not([type="hidden"]):not([type="checkbox"]), button');
                if (firstInput) {
                    window.setTimeout(() => firstInput.focus({ preventScroll: true }), prefersReducedMotion ? 0 : 220);
                }
            }
        };

        if (loginForm && registerForm && tabs.length) {
            const hasRegisterNotice = /register|inscription|compte|mot de passe|conditions|confidentialité/i.test((accountAccess.querySelector('.woocommerce-error, .woocommerce-message, .woocommerce-info') || {}).textContent || '');
            const initialTab = window.location.hash.includes('register') || hasRegisterNotice ? 'register' : 'login';
            activateAccountTab(initialTab);

            tabs.forEach((tab) => {
                tab.addEventListener('click', () => activateAccountTab(tab.getAttribute('data-account-tab'), true));
                tab.addEventListener('keydown', (event) => {
                    if (!['ArrowLeft', 'ArrowRight'].includes(event.key)) {
                        return;
                    }

                    event.preventDefault();
                    const nextTab = tab.getAttribute('data-account-tab') === 'login' ? 'register' : 'login';
                    activateAccountTab(nextTab, true);
                    const nextButton = tabs.find((item) => item.getAttribute('data-account-tab') === nextTab);
                    if (nextButton) {
                        nextButton.focus();
                    }
                });
            });
        }

        document.querySelectorAll('[data-account-action]').forEach((trigger) => {
            trigger.addEventListener('click', (event) => {
                const action = trigger.getAttribute('data-account-action');
                const target = action === 'register' ? registerForm : loginForm;

                if (!target) {
                    return;
                }

                event.preventDefault();
                activateAccountTab(action === 'register' ? 'register' : 'login');
                target.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth', block: 'center' });
                target.classList.add('is-account-focused');

                const firstInput = target.querySelector('input:not([type="hidden"]):not([type="checkbox"]), button');
                if (firstInput) {
                    window.setTimeout(() => firstInput.focus({ preventScroll: true }), prefersReducedMotion ? 0 : 420);
                }

                window.setTimeout(() => target.classList.remove('is-account-focused'), 1400);
            });
        });

        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let passwordStrength = null;

        if (registerForm) {
            const registerPassword = registerForm.querySelector('input[name="password"]');
            const passwordRow = registerPassword ? registerPassword.closest('.form-row') : null;

            if (passwordRow && !passwordRow.querySelector('.account-password-strength')) {
                passwordStrength = document.createElement('div');
                passwordStrength.className = 'account-password-strength';
                passwordStrength.setAttribute('aria-live', 'polite');
                passwordStrength.innerHTML = '<span></span><small>Force du mot de passe</small>';
                passwordRow.appendChild(passwordStrength);
            } else if (passwordRow) {
                passwordStrength = passwordRow.querySelector('.account-password-strength');
            }
        }

        const getPasswordScore = (value) => {
            let score = 0;
            if (value.length >= 8) score += 1;
            if (/[a-z]/.test(value)) score += 1;
            if (/[A-Z]/.test(value)) score += 1;
            if (/\d/.test(value)) score += 1;
            if (/[^A-Za-z0-9]/.test(value)) score += 1;
            return score;
        };

        const updatePasswordStrength = (value) => {
            if (!passwordStrength) {
                return;
            }

            const score = getPasswordScore(value);
            const label = score >= 5 ? 'Excellent' : score >= 4 ? 'Fort' : score >= 3 ? 'Correct' : value ? 'Trop faible' : 'Force du mot de passe';
            passwordStrength.dataset.score = String(score);
            passwordStrength.querySelector('small').textContent = label;
        };

        const setFieldState = (field, valid, message = '') => {
            if (!field || field.type === 'hidden') {
                return;
            }

            const row = field.closest('.form-row') || field.parentElement;
            let feedback = row ? row.querySelector('.account-field-feedback') : null;

            if (!feedback && row) {
                feedback = document.createElement('span');
                feedback.className = 'account-field-feedback';
                feedback.setAttribute('aria-live', 'polite');
                row.appendChild(feedback);
            }

            if (row) {
                row.querySelectorAll('.account-field-feedback').forEach((item, index) => {
                    if (index > 0) {
                        item.remove();
                    }
                });
            }

            field.classList.toggle('is-valid', Boolean(valid));
            field.classList.toggle('is-invalid', valid === false);

            if (feedback) {
                feedback.textContent = valid === false ? message : '';
            }
        };

        const validateField = (field) => {
            if (!field || field.disabled || field.type === 'hidden') {
                return true;
            }

            const value = field.value.trim();
            const isRequired = field.required || field.closest('.woocommerce-form-register') && ['billing_first_name', 'billing_last_name', 'email', 'password', 'password_confirm'].includes(field.name);

            if (isRequired && !value) {
                setFieldState(field, false, 'Ce champ est requis.');
                return false;
            }

            if (field.type === 'email' && value && !emailPattern.test(value)) {
                setFieldState(field, false, 'Adresse e-mail invalide.');
                return false;
            }

            if (field.name === 'password' && field.closest('.woocommerce-form-register') && !passwordPattern.test(value)) {
                updatePasswordStrength(value);
                setFieldState(field, false, '8 caractères, une majuscule, une minuscule et un chiffre.');
                return false;
            }

            if (field.name === 'password' && field.closest('.woocommerce-form-register')) {
                updatePasswordStrength(value);
            }

            if (field.name === 'password_confirm') {
                const password = registerForm ? registerForm.querySelector('input[name="password"]') : null;
                if (password && value !== password.value) {
                    setFieldState(field, false, 'Les mots de passe ne correspondent pas.');
                    return false;
                }
            }

            if (value || isRequired) {
                setFieldState(field, true);
            }

            return true;
        };

        const accountAjax = window.cosmethiqueAccount || {};

        const showAccountNotice = (form, type, message) => {
            if (!form || !message) {
                return;
            }

            const wrapper = accountAccess.querySelector('.woocommerce-notices-wrapper') || accountAccess;
            let notice = wrapper.querySelector('.cosmethique-account-ajax-notice');

            if (!notice) {
                notice = document.createElement('div');
                notice.className = 'cosmethique-account-ajax-notice';
                notice.setAttribute('role', type === 'error' ? 'alert' : 'status');
                notice.setAttribute('aria-live', 'polite');
                wrapper.prepend(notice);
            }

            notice.className = `cosmethique-account-ajax-notice woocommerce-${type === 'error' ? 'error' : 'message'}`;
            notice.textContent = message;
        };

        const applyServerFieldError = (form, code, message) => {
            if (!form || !code || !message) {
                return;
            }

            const fieldMap = {
                missing_credentials: 'username',
                invalid_user: 'username',
                invalid_password: 'password',
                cosmethique_email_required: 'email',
                cosmethique_email_exists: 'email',
                cosmethique_password_required: 'password',
                cosmethique_password_strength: 'password',
                cosmethique_password_match: 'password_confirm',
                cosmethique_first_name_required: 'billing_first_name',
                cosmethique_last_name_required: 'billing_last_name',
                cosmethique_terms_required: 'cosmethique_accept_terms',
                cosmethique_privacy_required: 'cosmethique_accept_privacy'
            };
            const field = form.querySelector(`[name="${fieldMap[code] || ''}"]`);

            if (field && field.type !== 'checkbox') {
                setFieldState(field, false, message);
                field.focus();
            }
        };

        const submitAccountFormAjax = async (form) => {
            if (!accountAjax.ajaxUrl || !accountAjax.nonce || !window.fetch) {
                return false;
            }

            const submitButton = form.querySelector('button[type="submit"], .woocommerce-button');
            const isRegister = form.classList.contains('woocommerce-form-register');
            const formData = new FormData(form);
            formData.set('action', isRegister ? 'theme_perso_account_register' : 'theme_perso_account_login');
            formData.set('nonce', accountAjax.nonce);

            if (submitButton) {
                submitButton.classList.add('is-loading');
                submitButton.setAttribute('aria-busy', 'true');
                submitButton.disabled = true;
            }

            try {
                const response = await fetch(accountAjax.ajaxUrl, {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: formData
                });
                const payload = await response.json();

                if (!payload || !payload.success) {
                    const data = payload && payload.data ? payload.data : {};
                    const message = data.message || (accountAjax.labels && accountAjax.labels.networkError) || 'Une erreur est survenue. Merci de réessayer.';
                    showAccountNotice(form, 'error', message);
                    applyServerFieldError(form, data.code, message);
                    return true;
                }

                const message = payload.data && payload.data.message ? payload.data.message : (isRegister ? accountAjax.labels.registerSuccess : accountAjax.labels.loginSuccess);
                showAccountNotice(form, 'success', message);

                window.setTimeout(() => {
                    window.location.href = payload.data && payload.data.redirect ? payload.data.redirect : accountAjax.redirect;
                }, prefersReducedMotion ? 0 : 450);
                return true;
            } catch (error) {
                showAccountNotice(form, 'error', (accountAjax.labels && accountAjax.labels.networkError) || 'Une erreur est survenue. Merci de réessayer.');
                return true;
            } finally {
                if (submitButton) {
                    submitButton.classList.remove('is-loading');
                    submitButton.removeAttribute('aria-busy');
                    submitButton.disabled = false;
                }
            }
        };

        [loginForm, registerForm].filter(Boolean).forEach((form) => {
            form.querySelectorAll('input:not([type="hidden"]):not([type="checkbox"]), textarea').forEach((field) => {
                field.addEventListener('input', () => validateField(field));
                field.addEventListener('blur', () => validateField(field));
            });

            form.addEventListener('submit', async (event) => {
                const fields = Array.from(form.querySelectorAll('input:not([type="hidden"]):not([type="checkbox"]), textarea'));
                const isValid = fields.every(validateField);
                const submitButton = form.querySelector('button[type="submit"], .woocommerce-button');

                if (!isValid) {
                    event.preventDefault();
                    const firstInvalid = form.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.focus();
                    }
                    return;
                }

                if (accountAjax.ajaxUrl && accountAjax.nonce) {
                    event.preventDefault();
                    await submitAccountFormAjax(form);
                    return;
                }

                if (submitButton) {
                    submitButton.classList.add('is-loading');
                    submitButton.setAttribute('aria-busy', 'true');
                }
            });
        });
    }

});

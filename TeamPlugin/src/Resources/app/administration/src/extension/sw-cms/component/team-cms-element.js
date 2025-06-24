import template from './team-cms-element.html.twig';

Shopware.Component.register('team-cms-element', {
    template,
    mixins: [
        'cms-element'
    ],
    props: {
        element: {
            type: Object,
            required: true
        }
    }
});

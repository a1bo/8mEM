import template from './team-cms-element-config.html.twig';

Shopware.Component.register('team-cms-element-config', {
    template,

    mixins: [
        'cms-element'
    ],

    created() {
        this.initElementConfig();
    },

    methods: {
        onEmployeesChange(selection) {
            this.element.config.employees.value = selection.map(employee => employee.id);
        }
    }
});

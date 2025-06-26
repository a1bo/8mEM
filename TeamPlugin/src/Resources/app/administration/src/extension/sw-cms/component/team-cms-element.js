import template from './team-cms-element.html.twig';

Shopware.Component.register('team-cms-element', {
    template,
    inject: ['repositoryFactory'],
    mixins: [
        'cms-element'
    ],
    props: {
        element: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            employees: null
        };
    },
    created() {
        this.loadEmployees();
    },
    methods: {
        loadEmployees() {
            if (!this.element.config.employees.value || this.element.config.employees.value.length === 0) {
                this.employees = [];
                return;
            }

            const repository = this.repositoryFactory.create('team_employee');
            const criteria = new Shopware.Data.Criteria();
            criteria.setIds(this.element.config.employees.value);

            repository.search(criteria, Shopware.Context.api).then((result) => {
                this.employees = result;
            });
        }
    }
});

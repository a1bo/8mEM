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
            const repository = this.repositoryFactory.create('team_employee');
            repository.search(new Shopware.Data.Criteria(), Shopware.Context.api).then((result) => {
                this.employees = result;
            });
        }
    }
});

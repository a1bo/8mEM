import template from './team-list.html.twig';
const { Criteria } = Shopware.Data;

Shopware.Component.register('team-list', {
    template,
    inject: ['repositoryFactory'],
    data() {
        return {
            employees: null,
            isLoading: false,
            repository: null
        };
    },
    created() {
        this.repository = this.repositoryFactory.create('team_employee');
        this.loadEmployees();
    },
    methods: {
        loadEmployees() {
            this.isLoading = true;
            const criteria = new Criteria(1, 25);
            this.repository.search(criteria, Shopware.Context.api).then((result) => {
                this.employees = result;
                this.isLoading = false;
            });
        }
    }
});

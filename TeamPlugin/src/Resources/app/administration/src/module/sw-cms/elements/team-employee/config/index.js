const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('cms-element-team-employee-config', {
    template: './team-employee-config.html.twig',

    mixins: [
        Mixin.get('cms-element')
    ],

    data() {
        return {
            employees: null,
            employeeRepository: null,
        };
    },

    computed: {
        employeeIds: {
            get() {
                return this.element.config.employeeIds.value || [];
            },
            set(value) {
                this.element.config.employeeIds.value = value;
            }
        },

        employeeCriteria() {
            return new Criteria();
        },
    },

    created() {
        this.employeeRepository = this.repositoryFactory.create('team_employee');
        this.loadEmployees();
    },

    methods: {
        loadEmployees() {
            const criteria = new Criteria();
            criteria.addSorting(Criteria.sort('position', 'ASC'));

            this.employeeRepository.search(criteria, Shopware.Context.api).then((result) => {
                this.employees = result;
            });
        },
    }
});

import template from './team-employee-list.html.twig';

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('team-plugin-employee-list', {
    template,

    mixins: [
        Mixin.get('listing')
    ],

    data() {
        return {
            employees: [],
            repository: null,
            isLoading: false,
            employeeToDelete: null,
        };
    },

    metaInfo() {
        return {
            title: this.$t('team-employee.general.mainMenuItemGeneral')
        };
    },

    computed: {
        columns() {
            return [{
                property: 'position',
                label: this.$t('team-employee.list.columnPosition'),
                routerLink: 'team.plugin.employee.detail',
                inlineEdit: 'string',
                allowResize: true,
                primary: true
            }];
        }
    },

    created() {
        this.repository = this.repositoryFactory.create('team_employee');
        this.getList();
    },

    methods: {
        getList() {
            this.isLoading = true;
            const criteria = new Criteria(this.page, this.limit);
            criteria.addAssociation('personImage');

            this.repository
                .search(criteria, Shopware.Context.api)
                .then((result) => {
                    this.employees = result;
                    this.total = result.total;
                    this.isLoading = false;
                });
        },
        onDeleteEmployee(employee) {
            this.employeeToDelete = employee;
            this.$refs.confirmDeleteModal.open();
        },

        onConfirmDelete() {
            if (!this.employeeToDelete) {
                return;
            }

            this.isLoading = true;
            this.repository.delete(this.employeeToDelete.id, Shopware.Context.api)
                .then(() => {
                    this.getList();
                })
                .finally(() => {
                    this.isLoading = false;
                    this.employeeToDelete = null;
                });
        },

        onCancelDelete() {
            this.employeeToDelete = null;
        }
    }
});

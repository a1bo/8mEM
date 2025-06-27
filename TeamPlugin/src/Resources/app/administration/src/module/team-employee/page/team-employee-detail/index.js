import template from './team-employee-detail.html.twig';

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('team-plugin-employee-detail', {
    template,

    mixins: [
        Mixin.get('notification'),
        Mixin.get('placeholder')
    ],

    data() {
        return {
            employee: null,
            isLoading: false,
            isSaveSuccessful: false,
            repository: null,
        };
    },

    metaInfo() {
        return {
            title: this.$t('team-employee.general.mainMenuItemGeneral')
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('team_employee');
        this.getEmployee();
    },

    methods: {
        getEmployee() {
            this.isLoading = true;
            const criteria = new Criteria();
            criteria.addAssociation('personImage');
            criteria.addAssociation('backgroundImage');

            if (this.$route.params.id) {
                this.repository
                    .get(this.$route.params.id, Shopware.Context.api, criteria)
                    .then((employee) => {
                        this.employee = employee;
                        this.isLoading = false;
                    });
            } else {
                // Using create instead of createNew
                this.repository.create(Shopware.Context.api).then(employee => {
                    this.employee = employee;
                    this.isLoading = false;
                });
            }
        },

        onSave() {
            this.isLoading = true;
            this.repository
                .save(this.employee, Shopware.Context.api)
                .then(() => {
                    this.getEmployee();
                    this.isSaveSuccessful = true;
                }).catch((exception) => {
                this.isLoading = false;
                this.createNotificationError({
                    title: this.$t('team-employee.detail.errorTitle'),
                    message: exception.message
                });
            });
        },

        saveFinish() {
            this.isSaveSuccessful = false;
        },

        onPersonImageUpload({ targetId }) {
            this.employee.personImageId = targetId;
        },

        onRemovePersonImage() {
            this.employee.personImageId = null;
        },

        onOpenPersonImage() {
            // Implement media modal opening if needed
        },

        onBackgroundImageUpload({ targetId }) {
            this.employee.backgroundImageId = targetId;
        },

        onRemoveBackgroundImage() {
            this.employee.backgroundImageId = null;
        },

        onOpenBackgroundImage() {
            // Implement media modal opening if needed
        },
    }
});

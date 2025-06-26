import template from './team-detail.html.twig';

const { Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Shopware.Component.register('team-detail', {
    template,

    inject: [
        'repositoryFactory'
    ],

    mixins: [
        Mixin.getByName('notification')
    ],

    metaInfo() {
        return {
            title: this.$createTitle()
        };
    },

    data() {
        return {
            employee: null,
            isLoading: false,
            processSuccess: false,
            repository: null
        };
    },

    computed: {
        employeeRepository() {
            return this.repositoryFactory.create('team_employee');
        },

        mediaRepository() {
            return this.repositoryFactory.create('media');
        },

        isCreateMode() {
            return this.$route.name === 'team.plugin.create';
        },

        tooltipSave() {
            const systemKey = this.$device.getSystemKey();

            return {
                message: `${systemKey} + S`,
                appearance: 'light'
            };
        },

        tooltipCancel() {
            return {
                message: 'ESC',
                appearance: 'light'
            };
        }
    },

    created() {
        this.repository = this.employeeRepository;
        this.getEmployee();
    },

    methods: {
        getEmployee() {
            const criteria = new Criteria();
            criteria.addAssociation('backgroundImage');
            criteria.addAssociation('personImage');

            if (this.isCreateMode) {
                this.employee = this.repository.create(Shopware.Context.api);
                return;
            }

            this.repository
                .get(this.$route.params.id, Shopware.Context.api, criteria)
                .then((entity) => {
                    this.employee = entity;
                });
        },

        onClickSave() {
            this.isLoading = true;

            this.repository
                .save(this.employee, Shopware.Context.api)
                .then(() => {
                    this.getEmployee();
                    this.isLoading = false;
                    this.processSuccess = true;
                }).catch((exception) => {
                    this.isLoading = false;
                    this.createNotificationError({
                        title: this.$t('team-plugin.detail.errorTitle'),
                        message: exception
                    });
                });
        },

        onClickCancel() {
            this.$router.push({ name: 'team.plugin.list' });
        },

        saveFinish() {
            this.processSuccess = false;
        },

        onDropMedia(dragData) {
            this.setMediaItem({ targetId: dragData.id });
        },

        setMediaItem({ targetId }) {
            this.mediaRepository.get(targetId, Shopware.Context.api).then((media) => {
                this.employee.backgroundImageId = targetId;
                this.employee.backgroundImage = media;
            });
        },

        onUnlinkBackgroundImage() {
            this.employee.backgroundImageId = null;
            this.employee.backgroundImage = null;
        },

        onDropPersonMedia(dragData) {
            this.setPersonMediaItem({ targetId: dragData.id });
        },

        setPersonMediaItem({ targetId }) {
            this.mediaRepository.get(targetId, Shopware.Context.api).then((media) => {
                this.employee.personImageId = targetId;
                this.employee.personImage = media;
            });
        },

        onUnlinkPersonImage() {
            this.employee.personImageId = null;
            this.employee.personImage = null;
        }
    }
});

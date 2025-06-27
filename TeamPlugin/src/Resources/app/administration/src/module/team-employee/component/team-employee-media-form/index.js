import template from './team-employee-media-form.html.twig';

const { Component } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('team-employee-media-form', {
    template,

    props: {
        mediaId: {
            type: String,
            required: false,
            default: null
        },
        mediaItem: {
            type: Object,
            required: false,
            default: null
        }
    },

    data() {
        return {
            isLoading: false,
            mediaRepository: null,
        };
    },

    computed: {
        hasMedia() {
            return this.mediaItem !== null;
        }
    },

    created() {
        this.mediaRepository = this.repositoryFactory.create('media');
    },

    methods: {
        onImageUpload({ targetId }) {
            this.isLoading = true;
            this.mediaRepository.get(targetId, Shopware.Context.api)
                .then((media) => {
                    this.$emit('media-upload', media);
                    this.isLoading = false;
                }).catch(() => {
                this.isLoading = false;
            });
        },

        onRemoveImage() {
            this.$emit('media-remove');
        },

        onOpenMediaModal() {
            this.$emit('media-open');
        }
    }
});

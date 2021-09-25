// define a mixin object
export default {
    methods: {
        showSuccessMessage(message) {
            this.$notify({
                type: 'success',
                text: message,
            });
        },

        showErrorMessage(message) {
            this.$notify({
                type: 'error',
                text: message,
            });
        }
    }
}

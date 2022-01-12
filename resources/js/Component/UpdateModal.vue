<template>
    <div>
        <div class="modal-card" style="width: auto">
            <form @submit.prevent="submit">
                <section class="modal-card-body">
                    <b-field label="Album name">
                        <b-input
                            v-model="form.albumName"
                            placeholder="Album name"
                            type="text"
                            required
                        ></b-input>
                    </b-field>

                    <b-field>
                        <b-radio-button
                            v-model="form.isPrivate"
                            native-value="true"
                            type="is-primary is-light is-outlined"
                        >
                            <b-icon icon="lock" pack="fa"></b-icon>
                            <span>Private</span>
                        </b-radio-button>

                        <b-radio-button
                            v-model="form.isPrivate"
                            native-value="false"
                            type="is-primary is-light is-outlined"
                        >
                            <b-icon icon="unlock" pack="fa"></b-icon>
                            <span>Public</span>
                        </b-radio-button>
                    </b-field>
                </section>

                <footer class="modal-card-foot">
                    <b-button label="Close" @click="$emit('close')" />
                    <b-button
                        label="Update"
                        type="is-primary"
                        native-type="submit"
                        :disabled="!allowCreation"
                    />
                </footer>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "UpdateModal",
    props: ['album'],
    data() {
        return {
            form: this.$inertia.form({
                albumName: this.album.name,
                isPrivate: this.album.is_private === 1 ? "true" : "false",
            }),
        };
    },
    computed: {
        allowCreation() {
            return this.form.albumName && this.form.isPrivate !== null;
        },
    },
    methods: {
        submit() {
            this.form.put(route("albums.update", this.album), {
                onSuccess: () => this.$parent.close(),
            });
        },
    },

};
</script>

<style scoped lang="scss">
.modal-card-body {
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}
</style>

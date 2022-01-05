<template>
<div>
    <div class="modal-card" style="width: auto">
        <form @submit.prevent="submit">
            <section class="modal-card-body">
                <b-message type="is-danger" v-show="form.hasErrors">
                    <ul>
                        <li v-for="(msg, file) in form.errors">
                            {{ msg.replace("The " + file, form.images[Number(file.split('.')[1])].name) }}
                        </li>
                    </ul>
                </b-message>
                <b-field>
                    <b-upload v-model="form.images" multiple drag-drop :accept="acceptFiles" @input="isUploadAllowed" expanded>
                        <section class="section">
                            <div class="content has-text-centered">
                                <p>
                                    <b-icon icon="upload" size="is-large"></b-icon>
                                </p>
                                <p>Drop your images here or click to upload (*.jpg, *.jpeg, *.png)</p>
                                <p>Max size : {{ this.maxFileSizeInKb/1000 }} Mb</p>
                            </div>
                        </section>
                    </b-upload>
                </b-field>

                <b-field grouped group-multiline>
                    <div class="control" v-for="(file, index) in form.images" :key="index" >
                        <b-taglist attached closable>
                            <b-tag type="is-primary">
                                {{file.name}}
                                <button class="delete is-small" type="button" @click="deleteDropFile(index)"></button>
                            </b-tag>
                            <b-tag type="is-info">{{ Number(file.size/1000000).toFixed(2) }}Mb</b-tag>
                        </b-taglist>
                    </div>
                </b-field>
            </section>
            <footer class="modal-card-foot">
                <b-button label="Close" @click="$emit('close')" />
                <b-button native-type="submit" class="is-primary" :disabled="!allowUpload">Add to Album</b-button>
            </footer>
        </form>
    </div>
</div>
</template>

<script>

export default {
    name: "UploadModal",
    props:['galleryId'],
    data() {
        return {
            dropFiles: [],
            acceptFiles: ".png, .jpg, .jpeg",
            maxFileSizeInKb: 3000,
            allowUpload:false,
            form: this.$inertia.form({
                images: [],
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route("photos.store", this.galleryId));
        },
        deleteDropFile(index) {
            this.form.clearErrors();
            this.form.images.splice(index, 1)
            this.isUploadAllowed();
        },
        isUploadAllowed() {
            this.allowUpload = this.checkFileSize()
        },
        checkFileSize() {
            if (this.form.images.length === 0)
                return false;

            for(let index in this.form.images) {
                if (this.form.images[index].size/1000 > this.maxFileSizeInKb)
                    return false;
            }
            return true;
        },
    }
}
</script>

<style scoped lang="scss">
    .modal-card-body {
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }
</style>

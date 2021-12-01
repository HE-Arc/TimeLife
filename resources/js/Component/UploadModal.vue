<template>
<div>
    <div class="modal-card" style="width: auto">
        <section class="modal-card-body">
            <b-field>
                <b-upload v-model="dropFiles"
                          multiple
                          drag-drop>
                    <section class="section">
                        <div class="content has-text-centered">
                            <p>
                                <b-icon
                                    icon="upload"
                                    size="is-large">
                                </b-icon>
                            </p>
                            <p>Drop your images here or click to upload (*.jpg, *.jpeg, *.png)</p>
                        </div>
                    </section>
                </b-upload>
            </b-field>

            <div class="tags">
                <span v-for="(file, index) in dropFiles"
                      :key="index"
                      class="tag is-primary" >
                    {{file.name}}
                    <button class="delete is-small"
                            type="button"
                            @click="deleteDropFile(index)">
                    </button>
                </span>
            </div>
        </section>
        <footer class="modal-card-foot">
            <b-button
                label="Close"
                @click="$emit('close')" />
            <b-button
                label="Upload"
                type="is-primary" />
        </footer>
    </div>
</div>
</template>

<script>
export default {
    name: "UploadModal",
    data() {
        return {
            dropFiles: []
        }
    },
    methods: {
        deleteDropFile(index) {
            this.dropFiles.splice(index, 1)
        }
    }
}
</script>

<style scoped lang="scss">
    .modal-card-body {
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }
</style>

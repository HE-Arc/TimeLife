<template>
<div>
    <div class="modal-card" style="width: auto">
        <section class="modal-card-body">
            <b-field>
                <b-upload v-model="dropFiles" multiple drag-drop :accept="acceptFiles" @input="isUploadAllowed" expanded>
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
                <div class="control" v-for="(file, index) in dropFiles" :key="index" >
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
            <b-button label="Add to album" :disabled="!allowUpload" type="is-primary" />
        </footer>
    </div>
</div>
</template>

<script>
export default {
    name: "UploadModal",
    data() {
        return {
            dropFiles: [],
            acceptFiles: ".png, .jpg, .jpeg",
            maxFileSizeInKb: 3000,
            allowUpload:false
        }
    },
    methods: {
        deleteDropFile(index) {
            this.dropFiles.splice(index, 1)
            this.isUploadAllowed();
        },
        isUploadAllowed() {
            this.allowUpload = this.checkFileSize()
        },
        checkFileSize() {
            if (this.dropFiles.empty)
                return false;

            for(let index in this.dropFiles) {
                if (this.dropFiles[index].size/1000 > this.maxFileSizeInKb)
                    return false;
            }
            return true;
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

<template>
    <section>
        <div class="box is-dark" :style="background">
            <div class="container has-text-centered is-dark">
                <p class="title is-4">{{ title }}</p>
                <p class="subtitle is-6">{{ username }}</p>
            </div>
        </div>
    </section>
</template>
<style scoped lang="scss">
.box {
    background-size: cover;
    p {
        color: white;
    }
}
.container {
    padding-top: 75px;
    padding-bottom: 75px;
}
</style>
<script>
export default {
    props: ["title", "username", "thumbnail"],
    computed: {
        background() {
            return (
                ' background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)), url("' +
                this.thumbnail +
                '") no-repeat center center;'
            );
        },
    },
};
</script>

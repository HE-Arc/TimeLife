<template>
    <section>
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img :src="source" :alt="name" />
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="subtitle is-6">{{ name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<style scoped lang="scss">
.card-content {
    padding: 1rem;
}
</style>
<script>
export default {
    props: ["name", "source"],
};
</script>

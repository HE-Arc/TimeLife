<template>
    <section>
        <div class="card">
            <div class="box is-dark">
                <div class="container has-text-centered is-dark">
                    <p class="title is-4">Vacances a Rome</p>
                    <p class="subtitle is-6">Bedric Sila</p>
                </div>
            </div>
            <!--
            <div class="card-image">
                <figure class="image is-4by3">
                    <img
                        src="https://picsum.photos/600/400"
                        alt="Placeholder image"
                    />
                </figure>
            </div>

            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-4">John Smith</p>
                        <p class="subtitle is-6">Vacances a Rome</p>
                    </div>
                </div>
            </div>
            -->
        </div>
    </section>
</template>
<style scoped lang="scss">
.box {
    background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)),
        url("https://picsum.photos/600/400") no-repeat center center;
    background-size: cover;
    p {
        color: white;
    }
}
.container {
    padding-top: 75px;
    padding-bottom: 75px;
}
.card-content {
    padding: 1rem;
}
</style>


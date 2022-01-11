<template>
    <div class="event-card">
        <img :src="event.image" :alt="event.name" class="event-image thumbnailed" />

        <Bar :date="event.date" class="example" />

        <div class="box event-title">
            <h3>{{ event.name | truncate(10, '...')  }}</h3>
        </div>
    </div>
</template>

<script>
import Bar from "./Bar";

export default {
    name: "TimelineEvent",
    components: {
        Bar
    },
    props: {
        event: {},
        index: Number,
    },
    data() {
        return {
            emitter,
        };
    },
}
</script>

<style scoped>

.thumbnailed {
    border:6px solid white;
    box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
}

.event-title {
    width: 70%;
    text-align: center;
    margin-top: 1.5rem;
    display: flex;
    flex-direction: column;
    z-index:10;
}

.event-card {
    min-width: 350px;
    max-width: 350px;
    margin: 5px 0;
    padding: 5px;
    position: relative;
    display: grid;
    grid-template-rows: 200px 130px 1fr;
    justify-items: center;
    align-self:center;
}
.event-image {
    width: 80%;
    height: 100%;
    border-radius: 5px;
    object-fit: cover;
    object-position: center;
}

</style>

<template>
    <div class="event-card">
        <img :src="event.image" :alt="event.name" class="event-card__image" />
        <Bar :date="event.date" class="example" />

        <!--<div class="content">
            <h3 class="event-card__name">{{ event.name }}</h3>
            <p class="event-card__description">{{ event.description }}</p>
        </div>-->
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
.event-card__image {
    width: 80%;
    height: 100%;
    border-radius: 5px;
    object-fit: cover;
    object-position: center;
}
.content {
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column;
}
.event-card:hover .event-card__actions {
    opacity: 1;
}
.event-card__name,
.event-card__description {
    margin-top: 5px;
}

</style>

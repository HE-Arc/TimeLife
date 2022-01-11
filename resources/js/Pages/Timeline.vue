<template>
    <div>
        <Head title="Timeline" ></Head>
        <Menu />
        <section>

        <div class="timeline">
            <TimelineEvent
                :event="event"
                :index="i"
                v-for="(event, i) of events"
                :key="i"
            />
        </div>

        </section>
        <Footer />
    </div>



</template>

<script>

import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from '../Component/Menu.vue';
import Footer from '../Component/Footer.vue';
import TimelineEvent from "../Component/Timeline/TimelineEvent.vue";

export default {
    name: "Timeline",
    components: {
        TimelineEvent,
        Head,
        Menu,
        Footer,
    },
    data(){
        return {
            events: [
                {name: "LOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=96", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=96", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=96", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=96", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=96", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=96", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=96", date: ""},
                {name: "LOsL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=96", date: ""}
            ]
        }
    },
}
</script>

<style scoped lang="scss">
.timeline {
    display: flex;
    overflow-x: auto;
    background-color: rgba(0,0,0,.6);
    min-height: calc(100vh - 3.25rem)
}
.timeline::-webkit-scrollbar {
    height: 20px;
}
</style>

<template>
    <div>
        <Head title="Timeline" ></Head>
        <Menu />
        <section class="timeline-box">
            <div class="timeline">
                <TimelineEvent
                    :event="photo"
                    :index="i"
                    v-for="(photo, i) of photos"
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
    props: {
        photos: {}
    },
    data(){
        return {
            events: [
                {name: "LOAFPJEAPOFAPOJFAWFL",  description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LsOL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""},
                {name: "LOsL", description: "AA", image: "https://cdn.libravatar.org/avatar/09927bcf2515b85a5c04d745c02f647b?s=256", date: ""}
            ]
        }
    },
}
</script>

<style scoped lang="scss">
.timeline {
    display: flex;
}

.timeline-box {
    display:flex;
    overflow-x: auto;
    background-color: #833471;
    min-height: calc(100vh - 3.25rem);
}

.scroll-message {
    display:flex;
}

.timeline::-webkit-scrollbar {
    height: 20px;
}
</style>

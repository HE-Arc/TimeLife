
<template>
    <div>
        <span class="vertical-bar"></span>
    <time v-html="humanDate"></time>
        <span class="vertical-bar bottom"></span>
    </div>
</template>
<script>
export default {
    name: "Bar",
    props: ["date"],
    computed: {
        humanDate() {
            let d = new Date(this.date);
            return d.getDate() + "<br>" + this.MONTHS[d.getMonth()] + "<br>" + d.getFullYear();
        }
    },
    data() {
        return {
            MONTHS: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ]
        }
    }
}
</script>

<style scoped lang="scss">

$bar-color: #F79F1F;

time {
    width: 120px;
    height: 120px;
    margin: 15px;
    text-align: center;
    border: 3px solid $bar-color;
    border-radius: 100%;
    background-color: white;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index:10
}

time::before,
time::after {
    content: " ";
    width: 110%;
    height: 5px;
    display: block;
    background: $bar-color;
    top: 50%;
    position: absolute;
    z-index: 5;
}

time::after {
    left: 100%;
}
time::before {
    right: 100%;
}

.vertical-bar {
    &::before, &::after {
        content: " ";
        height:40px;
        width:5px;
        background-color: $bar-color;
        display:block;
        position:absolute;
        left:50%;
        z-index:5;
    }
    &.bottom {
        &::before, &::after {
            margin-top:-20px;
        }
    }
}

</style>

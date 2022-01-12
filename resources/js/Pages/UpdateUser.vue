<template>
    <div>
    <Menu />
    <Head title="Update User" />
    <section>
        <b-message type="is-danger" v-show="formInf.hasErrors">
            <ul >
                <li v-for="msg in formInf.errors" :key="msg">
                    {{ msg }}
                </li>
            </ul>
        </b-message>
        <b-message type="is-danger" v-show="formIdentity.hasErrors">
            <ul >
                <li v-for="msg in formIdentity.errors" :key="msg">
                    {{ msg }}
                </li>
            </ul>
        </b-message>
        <b-message
                    type="is-danger"
                    v-if="$page.props.flash.error">
                        {{ $page.props.flash.error }}

        </b-message>
        <h2 class="title is-2"> Update Information </h2>
        <div class="box">
            <form  @submit.prevent="updateInf">
                <div class="container">
                    <b-field label="Lastname">
                        <b-input id="last_name" required v-model="formInf.last_name"></b-input>
                    </b-field>

                    <b-field label="Firstname">
                        <b-input id="first_name" required v-model="formInf.first_name"></b-input>
                    </b-field>

                    <b-field label="Description">
                        <b-input id="description" v-model="formInf.description" type="textarea"></b-input>
                    </b-field>

                    <div class="buttons">

                        <button type="submit" class="button is-primary"><strong>Update</strong></button>

                    </div>

                </div>
            </form>
        </div>
        <h2 class="title is-2"> Update Identification </h2>
        <div class="box">
            <form  @submit.prevent="updateId">
                <div class="container">
                    <b-field label="Email">
                        <b-input id="email" required v-model="formIdentity.email" type="email">
                        </b-input>
                    </b-field>

                    <b-field label="Old Password">
                        <b-input id="oldpassword" required v-model="formIdentity.oldpassword" type="password" ></b-input>
                    </b-field>

                    <b-field label="New Password">
                        <b-input id="newpassword" required v-model="formIdentity.newpassword" type="password" ></b-input>
                    </b-field>

                    <b-field label="Confirm New Password">
                        <b-input id="newpassword2" required v-model="formIdentity.newpassword2" type="password" ></b-input>
                    </b-field>

                    <div class="buttons">
                        <button type="submit" class="button is-primary"><strong>Update</strong></button>
                    </div>

                </div>
            </form>
        </div>
        <b-message
                    type="is-danger"
                    v-if="$page.props.flash.error">
                        {{ $page.props.flash.error }}

        </b-message>
    </section>
    <Footer />
    </div>
</template>

<style scoped>
 section {
     width: 40vw;
     padding: 2rem;
     margin: 0 auto;
 }
</style>

<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from '../Component/Menu.vue';
import Footer from '../Component/Footer.vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    name: "UpdateUser",
    props: {
        user: Object,
    },
    data(){
        return {
            formInf: this.$inertia.form({
                last_name: this.user.last_name,
                first_name: this.user.first_name,
                description: this.user.description,
            }),
            formIdentity: this.$inertia.form({
                email: this.user.email,
                oldpassword: null,
                newpassword: null,
                newpassword2: null,
            }),
        }
    },
    components: {
        Link,
        Head,
        Menu,
        Footer
    },

    methods: {
        updateInf()
        {
            this.formInf.put(route('users.update', this.user))
        },
        updateId()
        {
            if(this.formIdentity.newpassword ==  this.formIdentity.newpassword2)
            {
                this.formIdentity.put(route('users.update', this.user))
                this.formIdentity.reset('oldpassword')
                this.formIdentity.reset('newpassword')
                this.formIdentity.reset('newpassword2')
            }
            else
            {
                this.$page.props.flash.error = "New password are not the same"
            }
        }
    }
};

</script>

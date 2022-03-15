<template>
    <div class="container">
        <div v-if="success" class="alert alert-success" role="alert">
            Mail inviata correttamente!
        </div>
        <form @submit.prevent="sendForm">
            <div class="form-group mt-3">
                <label for="name">Nome</label>
                <input
                    v-model="name"
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                />
                <p v-for="(error, index) in errors.name" :key="index">
                    {{error}}
                </p>
            </div>

            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="name@example.com"
                    v-model="email"
                    name="email"
                />
                <p v-for="(error, index) in errors.email" :key="index">
                    {{error}}
                </p>
            </div>

            <div class="form-group mt-3">
                <label for="message">Messagio</label>
                <textarea
                    v-model="message"
                    class="form-control"
                    id="message"
                    rows="3"
                    name="message"
                ></textarea>
                <p v-for="(error, index) in errors.message" :key="index">
                    {{error}}
                </p>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Contact",
    data() {
        return {
            name: null,
            email: null,
            message: null,
            success: false,
            sending: false,
            errors: {}
        };
    },
    methods: {
        sendForm() {
            this.sending = true;
            this.success = false;
            axios.post("/api/contacts", 
                {
                    'name': this.name,
                    'email': this.email,
                    'message': this.message,
                })
                .then((response) => {
                    console.log(response.data);
                    if(!response.data.success) {
                        this.success = false;
                        this.errors = response.data.errors;
                    }
                    else {
                        this.success = true;
                        this.errors = {};
                        this.name = "";
                        this.email = "";
                        this.message = "";
                    }
                    this.sending = false;
                })
                .catch((error) => {
                    console.log(error.response.data);
                    this.sending = false;
                });
        },
    },
};
</script>

<style></style>

<template>
    <div>
        <form @submit.prevent="sendForm">
            <div class="form-group mt-3">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    v-model="name"
                />
            </div>

            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="name@example.com"
                    v-model="email"
                />
            </div>

            <div class="form-group mt-3">
                <label for="message">Message</label>
                <textarea
                    v-model="message"
                    class="form-control"
                    id="message"
                    rows="3"
                ></textarea>
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
            messagge: null,
        };
    },
    methods: {
        sendForm() {
            axios
                .post("/api/contacts", {
                    name: this.name,
                    email: this.email,
                    message: this.message,
                })
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error.response.data);
                });
        },
    },
};
</script>

<style></style>

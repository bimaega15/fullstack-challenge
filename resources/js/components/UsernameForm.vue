<template>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card mb-3 bg-shadow">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">
                            Account Chat App
                        </h5>
                        <p class="text-center small">
                            Masukan username account kamu
                        </p>
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">
                            Username
                        </label>
                        <input
                            type="text"
                            name="username"
                            :class="{
                                'form-control': true,
                                'border border-danger':
                                    (username.trim() === '' &&
                                        usernameSubmitted) ||
                                    (username.includes(' ') &&
                                        usernameSubmitted),
                            }"
                            placeholder="Masukan username..."
                            v-model="username"
                            @input="handleInput"
                        />
                        <small
                            v-if="username.trim() === '' && usernameSubmitted"
                            class="text-danger"
                        >
                            Username tidak boleh kosong
                        </small>
                        <small
                            v-if="username.includes(' ') && usernameSubmitted"
                            class="text-danger"
                        >
                            Username tidak boleh mengandung spasi
                        </small>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button
                            @click="submitUsername"
                            class="btn btn-primary w-25"
                            type="submit"
                            id="btn-submit"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: "",
            usernameSubmitted: false,
        };
    },
    methods: {
        handleInput(event) {
            this.username = event.target.value.toLowerCase();
            this.usernameSubmitted = false;
        },
        submitUsername() {
            this.usernameSubmitted = true;
            if (!this.username.trim() || this.username.includes(" ")) {
                return;
            }
            this.$emit("username-submitted", this.username);
        },
    },
};
</script>

<style scoped>
.border-danger {
    border-color: red !important;
}
</style>

<template>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div
                    class="collapse navbar-collapse justify-content-center"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav mr-auto">
                        <li
                            class="nav-item"
                            v-for="item in menuItems"
                            :key="item.id"
                        >
                            <router-link
                                class="nav-link"
                                :to="{ name: item.routeName }"
                                >{{ item.label }}</router-link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            menuItems: [
                {
                    label: "Home",
                    routeName: "home",
                },
                {
                    label: "About",
                    routeName: "about",
                },
                {
                    label: "Contacts",
                    routeName: "contact",
                },
            ],
        };
    },
};
</script>

<style></style>

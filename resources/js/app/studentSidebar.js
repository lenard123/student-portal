export default {
    mounted() {
        const active = this.$el.dataset.active;
        if (active) {
            const navlink = this.$el.querySelector(`[data-page=${active}]`);
            if (navlink) {
                navlink.classList.add("active");
            }
        }
    },
};

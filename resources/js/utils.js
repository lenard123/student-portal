export const getRef = (id) => {
    return document.getElementById(id);
};

export const getCsrfToken = () => {
    return document.querySelector('meta[name="csrf-token"]').content;
};

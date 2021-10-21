<template>
  <div>
    <h2>Ciao sono la lista</h2>

    <div>{{ this.posts }}</div>
  </div>
</template>

<script>
/* import axios from "axios"; */
export default {
  name: "PostsList",
  data() {
    return {
      baseUri: "http://localhost:8080",
      posts: [],
    };
  },
  methods: {
    getPosts() {
      axios
        .get(`${this.baseUri}/api/posts`)
        .then((res) => {
          console.log(res.data);
          /* this.posts = res.data; */
        })
        .catch((err) => {
          console.error(err);
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style lang="scss" scoped>
</style>
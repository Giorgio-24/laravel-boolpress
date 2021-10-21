<template>
  <div class="row mt-4">
    <h2>Posts list:</h2>
    <table class="table mt-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Posted</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id">
          <th scope="row">{{ post.id }}</th>
          <td>{{ post.title }}</td>
          <td>{{ getDate(post.created_at) }}</td>
          <td><button class="btn btn-primary">Go to post</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
/* import axios from "axios"; */
export default {
  name: "PostsList",
  data() {
    return {
      baseUri: "http://localhost:8000",
      posts: [],
    };
  },
  methods: {
    getPosts() {
      axios
        .get(`${this.baseUri}/api/posts`)
        .then((res) => {
          this.posts = res.data;
        })
        .catch((err) => {
          console.error(err);
        });
    },
    getDate(date) {
      let postDate = new Date(date);
      let day = postDate.getDate();
      if (day < 10) {
        day = `0${day}`;
      }
      let month = postDate.getMonth();
      if (month < 10) {
        month = `0${month}`;
      }
      const year = postDate.getFullYear();
      return `${day}-${month}-${year}`;
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style lang="scss" scoped>
</style>
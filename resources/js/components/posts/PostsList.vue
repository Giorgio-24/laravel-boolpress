<template>
  <div class="row mt-4">
    <h2>Posts list:</h2>
    <table class="table mt-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Posted</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(post, index) in posts" :key="post.id">
          <th scope="row">
            {{ index + 1 + (pagination.currentPage - 1) * 10 }}
          </th>
          <td>{{ post.title }}</td>
          <td>
            <span
              v-if="post.category"
              class="px-3 py-1 badge badge-pill"
              :class="`badge-${post.category.color}`"
              >{{ post.category.name }}</span
            >
            <span v-else>No category</span>
          </td>
          <td>{{ getDate(post.created_at) }}</td>
          <td>
            <button class="btn btn-primary" @click="showPost(post.id)">
              Go to post //!Not working yet.
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <div
      aria-label="Page navigation example"
      class="d-flex justify-content-center w-100 mt-2"
    >
      <ul class="pagination">
        <li class="page-item clickable">
          <a
            v-if="pagination.currentPage > 1"
            @click="getPosts(pagination.currentPage - 1)"
            class="page-link"
            >Previous</a
          >
        </li>
        <li
          class="page-item clickable"
          :class="{ active: pagination.currentPage === n }"
          v-for="n in pagination.lastPage"
          :key="n"
          @click="getPosts(n)"
        >
          <a class="page-link">{{ n }}</a>
        </li>
        <li class="page-item">
          <a
            v-if="pagination.lastPage > pagination.currentPage"
            @click="getPosts(pagination.currentPage + 1)"
            class="page-link clickable"
            >Next</a
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostsList",
  data() {
    return {
      baseUri: "http://localhost:8000",
      posts: [],
      pagination: {},
    };
  },
  methods: {
    getPosts(page) {
      axios
        .get(`${this.baseUri}/api/posts?page=${page}`)
        .then((res) => {
          const { data, current_page, last_page } = res.data;

          this.posts = data;
          this.pagination = {
            currentPage: current_page,
            lastPage: last_page,
          };
        })
        .catch((err) => {
          console.error(err);
        });
    },
    showPost(id) {
      axios
        .get(`${this.baseUri}/api/posts/${id}`)
        .then((res) => {
          const data = res.data;
          this.posts = data;
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
.clickable {
  cursor: pointer;
}
</style>
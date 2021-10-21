<template>
  <div class="container-fluid">
    <Header />
    <main class="container">
      ciao
      <Postlist />
    </main>
  </div>
</template>

<script>
import Header from "./Header.vue";
import Postlist from "./posts/PostsList.vue";
export default {
  name: "App",
  components: {
    Header,
    Postlist,
  },
};
</script>

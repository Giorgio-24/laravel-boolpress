<template>
  <header class="row px-3 justify-content-between align-items-center">
    <h3 class="mt-0">Boolpress</h3>
    <nav>
      <a href="http://localhost:8000/login">Login</a>
    </nav>
  </header>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang="scss" scoped>
header {
  height: 90px;
  background-color: lightgrey;

  a {
    color: rgba(0, 0, 0, 0.5);
    text-decoration: none;
  }
}
</style>
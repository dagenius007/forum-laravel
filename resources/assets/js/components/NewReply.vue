<template>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div v-if="signedIn">
        <div v-if="user.blocked == 0 && user.role_id !== 1">
          <div class='form-group'>
            <at-ta :members="members">
              <template slot="item" scope="members">
                <img :src="members.item.avatar">
                <span v-text="members.item.name"></span>
              </template>
              <textarea name='body'
                id='body'
                class='form-control'
                placeholder='Have something to say?'
                rows='5'
                required
                v-model='body'>
              </textarea>
            </at-ta>
        
          </div>

          <button type='submit'
            class='btn btn--primary'
            @click='addReply'>Post</button>
        </div>
        <div v-else>
          <div v-if="user.role_id !== 1">You cannot post because you have been blocked</div>
          <div v-else>Admins cannot post</div>
            
        </div>
			</div>

			<p class='text-center' v-else>
				Please <a href='/login'>sign in</a> to participate in this discussion
			</p>
		</div>
	</div>
</template>

<script>
import AtTa from "vue-at/dist/vue-at-textarea";
export default {
  components: { AtTa },
  data() {
    return {
      body: "",
      members: window.App.users,
      user: window.App.user
    };
  },
  computed: {
    signedIn() {
      return window.App.signedIn ;
    }
  },
  methods: {
    addReply() {
      axios
        .post(location.pathname + "/replies", {
          body: this.body
        })
        .then(({ data }) => {
          // console.log(location);
          this.body = "";
          flash("Your reply has been created");
          this.$emit("created", data);
        });
    }
  }
};
</script>
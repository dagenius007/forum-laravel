<template>
	<!-- <button type='submit' :class='classes' @click='toggle'>
		<span class='glyphicon glyphicon-heart'></span>
		<span v-text='count'></span>
	</button> -->
    <div>
		<div v-if = '!isFollowing'>
        	<button class="btn btn--gradient"  @click='follow'>Follow</button>
		</div>
		<div v-else>
			<button class="btn btn--gradient"  @click='unfollow'>Unfollow</button>
		</div>
    </div>
    
</template>

<script>
export default {
	props: [
		'isfollowing',
		 'profileuser'
	],
	data(){
		return {
			isFollowing : this.isfollowing,
			user :this.profileuser
		}
	},
	mounted: function(){
		console.log(this.profileuser);
	},
	computed: {
		
		endpoint(){
            return "/profiles/" + this.profileuser + "/follow";
		}
	},
	methods: {
		follow(){
			axios.get("/profiles/" + this.profileuser+ "/follow");
			this.isFollowing = true;
		},
		unfollow(){
			axios.get("/profiles/" + this.profileuser+ "/unfollow");
			this.isFollowing = false;
		}
	}
}
</script>
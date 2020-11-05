
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });


const theirMessage = ({img, name, text, sent_time}) => `
    <div class="line__left">
        <figure>
            <img  src="${img}" alt="userIcon">
        </figure>
        <div class="line__left-text">
        <div class="name">${name}</div>
            <div class="left-text-date">
                <div class="text">${text}</div>
                <span class="date">${sent_time}</span>
            </div>
        </div>
    </div>
`;

const myMessage = ({text, sent_time}) => `
    <div class="line__right">
        <div class="text">${text}</div>
        <span class="date">${sent_time}</span>
    </div>
`;


$(function () {
    window.Echo.channel('post')
      .listen('GroupPosted', (e) => {
          console.log(e);

          //group_idとmessageのgroup_idが一致しなかったらajaxと通信しない->何も表示されない
          if(e.post.group_id != $("#group_id").val()){
            return;
          }

          $.ajax({
            url: '/groupMessage/getDetail',
            type: 'POST',
            data: {
                id: e.post.id
            },
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }).done(data => {
              console.log(data);
            let message = null;
            if (data[0].user_id == Laravel.user_id) {
                const date = moment(data[0].sent_time);
                message = myMessage({text: data[0].text, sent_time: date.format('HH:mm')})
            } else {
                const date = moment(data[0].sent_time);
                message = theirMessage({img: data[0].user.img, name: data[0].user.name, text: data[0].text, sent_time: date.format('HH:mm')})
            }

            $(".line__contents").append(message);

            $('.line__contents').animate({scrollTop: $('.line__contents')[0].scrollHeight}, 'slow');

          }).fail(error => {
            console.log(error);
          })

            $("#bms_send_message").val('');
    });

    $('#bms_send_btn').on('click', () => {
      const url = "/groupChat/create";
      $.ajax({
        url: url,
        type: 'POST',
        data: {
            text: $("#bms_send_message").val(),
            group_id: $("#group_id").val()
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
    })
  })

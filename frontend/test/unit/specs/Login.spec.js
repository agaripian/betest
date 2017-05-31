import Vue from 'vue';
import Login from '@/components/Login';
import services from '@/api/services';

describe('Login.vue', () => {
  it('should render login button', () => {
    const Constructor = Vue.extend(Login);
    const vm = new Constructor().$mount();
    expect(vm.$el.querySelector('.js-login__submit').textContent).toContain('Login');
  });

  it('should submit username and password and change route', (done) => {
    const Constructor = Vue.extend(Login);
    const vm = new Constructor().$mount();
    vm.$router = {};
    // eslint-disable-next-line no-undef
    vm.$router.push = jasmine.createSpy('spy').and.callFake((data) => {
      // Assert if router push state was called
      expect(data).toEqual({
        name: 'Profile',
        params: { userId: 1 },
      });
      done();
    });
    // eslint-disable-next-line no-undef
    spyOn(services, 'login').and.callFake((data) => {
      // Assert if correct input field data was submitted
      expect(data).toEqual({
        user_name: 'foo',
        password: 'bar',
      });
      return Promise.resolve({
        status: 200,
        json: () => Promise.resolve({ auth_token: 123, user_id: 1 }),
      });
    });
    const $username = vm.$el.querySelector('.js-login__username');
    $username.value = 'foo';
    $username.dispatchEvent(new Event('input'));

    const $password = vm.$el.querySelector('.js-login__password');
    $password.value = 'bar';
    $password.dispatchEvent(new Event('input'));

    vm.$el.querySelector('.js-login__submit').click();
  });
});

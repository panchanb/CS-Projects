package edu.kean.demo.config;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.method.configuration.EnableGlobalMethodSecurity;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.web.util.matcher.AntPathRequestMatcher;

@Configuration
@EnableWebSecurity
@EnableGlobalMethodSecurity(prePostEnabled = true)
public class SecurityConfig extends WebSecurityConfigurerAdapter {
	  @Autowired
	  UserDetailsService userDetailsService;
	  
	  @Bean
	  public BCryptPasswordEncoder passwordEncoder() {
	    return new BCryptPasswordEncoder();
	  };

	  
	  @Override
	  protected void configure(AuthenticationManagerBuilder auth) throws Exception {
	    auth.userDetailsService(userDetailsService).passwordEncoder(passwordEncoder());
	  }

	  @Override
	  protected void configure(HttpSecurity http) throws Exception {
	    http.authorizeRequests()
	    	.antMatchers(
	    		"/*",
	    		"/h2-console/**",
	    		"/registerpage",
	    		"/table",
                "/js/**",
                "/css/**",
                "/images/**",
                "/webjars/**").permitAll()
	    	.antMatchers("/user/**").access("hasRole('ROLE_USER')")
	    	.anyRequest().fullyAuthenticated()
            .and()
	    	.formLogin()
	    		.loginPage("/login")
	    		.defaultSuccessUrl("/userhome")
	    		.permitAll()
	    	.and()
	    	.logout()
	    		.invalidateHttpSession(true)
	    		.clearAuthentication(true)
	    		.logoutRequestMatcher(new AntPathRequestMatcher("/logout"))
	    		.logoutSuccessUrl("/login?logout")
	    		.permitAll();
	    http.csrf().disable(); // only for h2 db
		http.headers().frameOptions().disable(); // only for h2 db
	  }
}

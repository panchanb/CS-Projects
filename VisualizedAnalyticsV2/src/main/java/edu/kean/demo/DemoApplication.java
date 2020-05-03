package edu.kean.demo;

import java.util.ArrayList;
import java.util.Collection;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.core.annotation.Order;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;

import edu.kean.demo.domain.*;
import edu.kean.demo.repository.*;

@SpringBootApplication
public class DemoApplication {
	@Autowired
	BCryptPasswordEncoder passwordEncoder;
	
	public static void main(String[] args) {
		SpringApplication.run(DemoApplication.class, args);
	}

	@Bean
	@Order(1)
	CommandLineRunner command1(StockPERepository stockRepo) {
		return args -> {
			StockPE stockPE1 = new StockPE("Alphabet", "Google".toLowerCase(), 1315, 53.94, 62.47, 15.81, 1.33);
			StockPE stockPE2 = new StockPE("Microsoft", "MSFT".toLowerCase(), 158, 5.68, 6.3, 10.92, 2.3);
			StockPE stockPE3 = new StockPE("Facebook", "FB".toLowerCase(), 190, 9.11, 10.91, 1976, 0.88);
			StockPE stockPE4 = new StockPE("Alibaba Group", "BABA".toLowerCase(), 205, 50.52, 61.09, 20.92, 0.16);
			StockPE stockPE5 = new StockPE("Paypal", "PYPL".toLowerCase(), 108, 3.45, 4.17, 20.87, 1.24);
			StockPE stockPE6 = new StockPE("Apple", "AAPL".toLowerCase(), 274, 13.62, 15.68, 15.21, 1.15);

			stockRepo.save(stockPE1);
			stockRepo.save(stockPE2);
			stockRepo.save(stockPE3);
			stockRepo.save(stockPE4);
			stockRepo.save(stockPE5);
			stockRepo.save(stockPE6);

		};
	}
	
	@Bean
	@Order(2)
	CommandLineRunner command2(UserRepository userRepo) {
		ArrayList<Role> roles = new ArrayList<Role>();
		roles.add(new Role("USER"));
		return args -> {
			User user = new User("waitak", "wong", "waiwong@kean.edu", passwordEncoder.encode("Xy123456"), roles);
			userRepo.save(user);
			//User ruser = userRepo.findByEmail("waiwong@kean.edu");
			//Collection<Role> rroles = ruser.getRoles();
		};
	}
}

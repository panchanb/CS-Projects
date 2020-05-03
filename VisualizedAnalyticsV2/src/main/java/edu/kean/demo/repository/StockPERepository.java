package edu.kean.demo.repository;

import java.util.List;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import edu.kean.demo.domain.StockPE;

@Repository
public interface StockPERepository extends CrudRepository<StockPE, Long> {

	StockPE findByTicker(String ticker);
	List<StockPE> findAll();
}
package com.san.jshoutbox.dao;

import java.util.Date;
import java.util.List;

import javax.jdo.PersistenceManager;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

import com.san.jshoutbox.model.ShoutEntry;
import com.san.jshoutbox.util.DateUtil;

public class ShoutDAO {

	private static Log logger = LogFactory.getLog(ShoutDAO.class);

	public void shout(String shouter, String content, String ip) {

		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			// ... do stuff with pm ...
			ShoutEntry s = new ShoutEntry();
			s.setShouter(shouter);
			s.setContent(content);
			s.setDate(new Date());
			s.setIp(ip);
			pm.makePersistent(s);
		} finally {
			pm.close();
		}
	}

	public List<ShoutEntry> readAll() {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			javax.jdo.Query q = pm.newQuery("select from " + ShoutEntry.class.getName() + " order by date desc");
			List<ShoutEntry> entries = (List<ShoutEntry>) q.execute();
			logger.debug(entries);
			return entries;
		} finally {
			pm.close();
		}
	}
}


##################
# News extension
##################

#
# Schema for news table
#
CREATE TABLE tx_news_domain_model_news (
	tx_languagevisibility_visibility text NOT NULL
);

#
# Schema for news-media table
#
CREATE TABLE tx_news_domain_model_media (
	tx_languagevisibility_visibility text NOT NULL
);

#
# Schema for news-file table
#
CREATE TABLE tx_news_domain_model_file (
	tx_languagevisibility_visibility text NOT NULL
);

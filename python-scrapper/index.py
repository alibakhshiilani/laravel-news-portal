import mysql.connector
from Scraper import Scraper
from callbacks import callbacks,urls
import argparse


# parser = argparse.ArgumentParser(description='Scrape websites')
# parser.add_argument('website', type=str, help='Website to scrape')
# parser.add_argument('--all', type=str, help='Option 1 for scraping')
#
# args = parser.parse_args()

db = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",
            database="khabarchi"
        )

# if args.website == 'majalesalamat':
#     scraper = Scraper(urls["majalesalamat"], callbacks["majalesalamat"],db)
#     scraper.scrape()
# else:
#     print('Invalid website')

# scraper = Scraper(urls["majalesalamat"], callbacks["majalesalamat"],db)
# scraper.scrape()
#
# scraper = Scraper(urls["kojaro"], callbacks["kojaro"],db)
# scraper.scrape()

# scraper = Scraper(urls["khabarvarzeshi"], callbacks["khabarvarzeshi"],db)
# scraper.scrape()

# scraper = Scraper(urls["cinematicket"], callbacks["cinematicket"],db)
# scraper.scrape()

scraper = Scraper(urls["bartarinha"], callbacks["bartarinha"],db)
scraper.scrape()

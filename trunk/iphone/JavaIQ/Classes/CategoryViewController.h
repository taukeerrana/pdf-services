#import "AdViewController.h"

@class Record;
@class DataController;

@interface CategoryViewController : UITableViewController<AdMobDelegate> {
	DataController *dataController;
	NSString *group;
	AdViewController *adViewController;
}

@property (nonatomic, retain) DataController *dataController;
@property (nonatomic, retain) NSString *group;
@property(nonatomic,retain) IBOutlet AdViewController *adViewController;


@end
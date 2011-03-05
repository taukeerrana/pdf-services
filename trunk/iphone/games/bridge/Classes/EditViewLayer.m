//
//  EditViewLayer.m
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "EditViewLayer.h"


@implementation EditViewLayer

CCDirector *director;
CCSprite* grid;

-(id) init
{
	if( (self=[super init] )) {
			
		director = [CCDirector sharedDirector];
		
		CGSize size = [[CCDirector sharedDirector] winSize];
		
		CCSprite* wood = [CCSprite spriteWithFile:@"material-wood.png" ];
		wood.position =  CGPointMake( 400 , 300);
		
		CCSprite* steel = [CCSprite spriteWithFile:@"material-steel.png" ];
		steel.position =  CGPointMake( 450 , 300);
		
		CCSprite* landLeft = [CCSprite spriteWithFile:@"land-left.png" ];
		landLeft.position =  CGPointMake( 20 , 50);
		
		CCSprite* landRight = [CCSprite spriteWithFile:@"land-right.png" ];
		landRight.position =  CGPointMake( 400 , 55);
		
       // self.background = [tileMap layerNamed:@"bridge-grid-background.png"];
        
		//material
		[self addChild: wood];
		[self addChild: steel];
		
		//land
		[self addChild:landRight];
		[self addChild:landLeft];
		
		
		grid = [CCSprite spriteWithFile:@"bridge-grid-background.png"];
		grid.position =ccp(480.f/2,320.f/2); 
		[self addChild:grid z:0];
		
		CCSprite* background = [CCSprite spriteWithFile:@"background-blue.png"];
		background.position =ccp(480.f/2,320.f/2); 
		[self addChild:background z:-1];
		
	}
	
	return self;
}




@end
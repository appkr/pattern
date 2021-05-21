package study.mediator2;

public class MediaController {

  VideoMediator videoMediator;

  void setVideoMediator(VideoMediator videoMediator) {
    this.videoMediator = videoMediator;
  }

  void onPressPlayButton() {
    videoMediator.playVideo();
  }

  void onPressPauseButton() {
    videoMediator.pauseVideo();
  }

  void onMoveProgressBar(int position) {
    videoMediator.moveVideo(position);
  }

  void onPressNextButton(VideoListUI videoListUI) {
    videoMediator.nextVideo(videoListUI);
  }

  void onPressPrevButton(VideoListUI videoListUI) {
    videoMediator.prevVideo(videoListUI);
  }
}

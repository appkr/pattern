package study.mediator2;

public class VideoMediator {

  VideoPlayer videoPlayer;
  MediaController mediaController;
  TitleUI titleUI;

  VideoMediator(VideoPlayer videoPlayer, MediaController mediaController, TitleUI titleUI) {
    this.videoPlayer = videoPlayer;
    this.mediaController = mediaController;
    this.titleUI = titleUI;
  }

  void selectVideo(VideoInfo videoInfo) {
    titleUI.setTitle(videoInfo);
    videoPlayer.play(videoInfo);
  }

  void playVideo() {
    videoPlayer.play();
  }

  void pauseVideo() {
    videoPlayer.pause();
  }

  void moveVideo(int position) {
    videoPlayer.moveTo(position);
  }

  void nextVideo(VideoListUI videoListUI) {
    videoListUI.next();
  }

  void prevVideo(VideoListUI videoListUI) {
    videoListUI.prev();
  }
}
